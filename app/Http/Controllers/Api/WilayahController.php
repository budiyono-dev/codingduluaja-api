<?php

namespace App\Http\Controllers\Api;

use App\Constants\ResponseCode;
use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SearchWilayahRequest;
use App\Models\Api\Wilayah\Desa;
use App\Models\Api\Wilayah\Kabupaten;
use App\Models\Api\Wilayah\Kecamatan;
use App\Models\Api\Wilayah\Provinsi;
use App\Services\Wilayah\Wilayah;
use App\Traits\ApiContext;
use Exception;
use Illuminate\Support\Facades\Log;

class WilayahController extends Controller
{
    use ApiContext;

    public function __construct(
        protected ResponseHelper $responseHelper,
        protected Wilayah $wilayah
    ) {}

    private const COLUMN_BPS = ['id', 'kode_bps as kode', 'nama_bps as nama'];

    private const COLUMN_DAGRI = ['id', 'kode_dagri as kode', 'nama_dagri as nama'];

    public function indexBps(SearchWilayahRequest $req)
    {
        return $this->getWilayah($req, true);
    }

    public function indexDagri(SearchWilayahRequest $req)
    {
        return $this->getWilayah($req, false);
    }

    public function findBps(string $wilayah, string $id)
    {
        return $this->findWilayah($wilayah, $id, true);
    }

    public function findDagri(string $wilayah, string $id)
    {
        return $this->findWilayah($wilayah, $id, false);
    }

    private function findWilayah(string $wilayah, string $id, bool $isBps)
    {
        try {
            $column = $isBps ? $this::COLUMN_BPS : $this::COLUMN_DAGRI;
            $kode = $isBps ? 'kode_bps' : 'kode_dagri';
            $data = [];
            if ($wilayah === 'kabupaten') {
                $data = Kabupaten::select($column)->where($kode, $id)->first();
            } elseif ($wilayah === 'kecamatan') {
                $data = Kecamatan::select($column)->where($kode, $id)->first();
            } elseif ($wilayah === 'desa') {
                $data = Desa::select($column)->where($kode, $id)->first();
            }

            if (! is_null($data)) {
                return $this->responseHelper->success('', 'success get data', ResponseCode::SUCCESS_GET_DATA, $data);
            }

            return $this->responseHelper->resourceNotFound('');
        } catch (Exception $e) {
            Log::info("[WILAYAH-API] message {$e->getMessage()}");

            return $this->responseHelper->resourceNotFound('');
        }
    }

    private function search(string $search, array $column, string $url, array $validated, bool $isBps)
    {
        $data = ['listWilayah' => [], 'actionTurunan' => []];

        if ($search === 'kabupaten') {
            $data['listWilayah'] = Kabupaten::select($column)
                ->where('provinsi_id', $validated['provinsi_id'])->get();
            $data['actionTurunan'] = $this->constructActionTurunan('Show Kecamatan', 'kecamatan', 'kabupaten_id', $url);
        } elseif ($search === 'kecamatan') {
            $data['listWilayah'] = Kecamatan::select($isBps ? $this::COLUMN_BPS : $this::COLUMN_DAGRI)
                ->where('kabupaten_id', $validated['kabupaten_id'])->get();
            $data['actionTurunan'] = $this->constructActionTurunan('Show Desa', 'desa', 'kecamatan_id', $url);
        } elseif ($search === 'desa') {
            $data['listWilayah'] = Desa::select($isBps ? $this::COLUMN_BPS : $this::COLUMN_DAGRI)
                ->where('kecamatan_id', $validated['kecamatan_id'])->get();
        }

        return $data;
    }

    private function getWilayah(SearchWilayahRequest $req, bool $isBps)
    {
        $validated = $req->validated();
        $data = [
            'title' => $isBps ? 'Wilayah BPS' : 'Wilayah Dagri',
            'listWilayah' => [],
            'actionTurunan' => [],
            'url_find' => $isBps
                ? route('res.findBps', ['wilayah' => ':wil', 'id' => ':id'])
                : route('res.findDagri', ['wilayah' => ':wil', 'id' => ':id']),
        ];

        $column = $isBps ? $this::COLUMN_BPS : $this::COLUMN_DAGRI;
        $url = $isBps ? route('res.wilayahBps') : route('res.wilayahDagri');

        if (array_key_exists('search', $validated)) {
            $data = [...$data, ...$this->search($validated['search'], $column, $url, $validated, $isBps)];
        } else {
            $data = [...$data, ...$this->getProvinsi($column, $url)];
        }

        return view('page.res.wilayah-bps', $data);
    }

    private function getProvinsi(array $column, string $url): array
    {
        return [
            'listWilayah' => Provinsi::all($column),
            'actionTurunan' => $this->constructActionTurunan('Show Kabupaten', 'kabupaten', 'provinsi_id', $url),
        ];
    }

    private function constructActionTurunan(string $text, string $search, string $param, string $url): array
    {
        return [
            'text' => $text,
            'search' => '<input type="hidden" name="search" value="'.$search.'">',
            'param' => '<input type="hidden" name="'.$param.'" value=":id">',
            'url' => $url,
        ];
    }
}
