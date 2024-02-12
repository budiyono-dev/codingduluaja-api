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
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiContext;

class WilayahController extends Controller
{
    use ApiContext;

    public function __construct(
        protected ResponseHelper $responseHelper,
        protected Wilayah $wilayah
    ) {
    }

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
                $data =  Kabupaten::select($column)->where($kode, $id)->first();
            } elseif ($wilayah === 'kecamatan') {
                $data =  Kecamatan::select($column)->where($kode, $id)->first();
            } elseif ($wilayah === 'desa') {
                $data =  Desa::select($column)->where($kode, $id)->first();
            }

            if (!is_null($data)) {
                return $this->responseHelper->success('', 'success get data', ResponseCode::SUCCESS_GET_DATA, $data);
            }
            return $this->responseHelper->resourceNotFound('');
        } catch (Exception $e) {
            Log::info("message {$e->getMessage()}");
            return $this->responseHelper->resourceNotFound('');
        }
    }

    private function getWilayah(SearchWilayahRequest $req, bool $isBps)
    {
        $title = $isBps ? 'Wilayah BPS' : 'Wilayah Dagri';
        $column = $isBps ? $this::COLUMN_BPS : $this::COLUMN_DAGRI;
        $url = $isBps ? route('page.res.wilayahBps') : route('page.res.wilayahDagri');
        $url_find = $isBps
            ? route('page.res.findBps', ['wilayah' => ':wil', 'id' => ':id'])
            : route('page.res.findDagri', ['wilayah' => ':wil', 'id' => ':id']);
        $validated = $req->validated();

        $listWilayah = [];
        $actionTurunan = [];
        if (array_key_exists('search', $validated)) {
            $search = $validated['search'];
            if ($search === 'kabupaten') {
                $listWilayah =  Kabupaten::select($column)
                    ->where('provinsi_id', $validated['provinsi_id'])
                    ->get();
                $actionTurunan = $this->constructActionTurunan('Show Kecamatan', 'kecamatan', 'kabupaten_id', $url);
            } elseif ($search === 'kecamatan') {
                $listWilayah =  Kecamatan::select($isBps ? $this::COLUMN_BPS : $this::COLUMN_DAGRI)
                    ->where('kabupaten_id', $validated['kabupaten_id'])
                    ->get();
                $actionTurunan = $this->constructActionTurunan('Show Desa', 'desa', 'kecamatan_id', $url);
            } elseif ($search === 'desa') {
                $listWilayah =  Desa::select($isBps ? $this::COLUMN_BPS : $this::COLUMN_DAGRI)
                    ->where('kecamatan_id', $validated['kecamatan_id'])
                    ->get();
            } else {
                ['listWilayah' => $listWilayah, 'actionTurunan' => $actionTurunan] =  $this->getProvinsi($column, $url);
            }
        } else {
            ['listWilayah' => $listWilayah, 'actionTurunan' => $actionTurunan] =  $this->getProvinsi($column, $url);
        }
        return view(
            'page.res.wilayah-bps',
            [
                'title' => $title,
                'listWilayah' => $listWilayah,
                'actionTurunan' => $actionTurunan,
                'url_find' => $url_find
            ]
        );
    }

    private function getProvinsi(array $column, string $url): array
    {
        return [
            'listWilayah' => Provinsi::all($column),
            'actionTurunan' => $this->constructActionTurunan('Show Kabupaten', 'kabupaten', 'provinsi_id', $url)
        ];
    }

    private function constructActionTurunan(string $text, string $search, string $param, string $url): array
    {
        return [
            'text' => $text,
            'search' => '<input type="hidden" name="search" value="' . $search . '">',
            'param' => '<input type="hidden" name="' . $param . '" value=":id">',
            'url' => $url
        ];
    }
}
