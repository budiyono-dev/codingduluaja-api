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
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Traits\ApiContext;
use Illuminate\Http\JsonResponse;

class WilayahController extends Controller
{
    use ApiContext;

    public function __construct(
        protected ResponseHelper $responseHelper,
    ) {
    }

    private const COLUMN_BPS = ['id', 'kode_bps as kode', 'nama_bps as nama'];
    private const COLUMN_DAGRI = ['id', 'kode_dagri as kode', 'nama_dagri as nama'];

    private const COLUMN_GET_LIST_BPS = ['id', 'nama_bps as nama'];
    private const COLUMN_GET_LIST_DAGRI = ['id', 'nama_dagri as nama'];

    private const COLUMN_GET_BPS = ['id', 'kode_bps as kode', 'nama_bps as nama'];
    private const COLUMN_GET_DAGRI = ['id', 'kode_dagri as kode', 'nama_dagri as nama'];

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

    // API Controller
    // all provinsi id => {id nama_bps}
    public function getListProvinsiBps(): JsonResponse
    {
        return $this->getListProvinsi(true);
    }

    public function getListProvinsiDagri(): JsonResponse
    {
        return $this->getListProvinsi(false);
    }

    private function getListProvinsi(bool $isBps): JsonResponse
    {
        $data = Provinsi::all($isBps ? $this::COLUMN_GET_LIST_BPS : $this::COLUMN_GET_LIST_DAGRI);
        return $this->responseHelper->success(
            $this->getRequestId(),
            'Successfully Get List Provinsi',
            ResponseCode::SUCCESS_GET_DATA,
            $data
        );
    }

    // {id, kode_bps, nama_bps}
    public function getProvinsiBps(string $id): JsonResponse
    {
        return $this->getProvinsiApi($id, true);
    }

    public function getProvinsiDagri(string $id): JsonResponse
    {
        return $this->getProvinsiApi($id, false);
    }

    private function getProvinsiApi(string $id, bool $isBps): JsonResponse
    {
        return $this->responseHelper->success(
            $this->getRequestId(),
            'Successfully Get Provinsi',
            ResponseCode::SUCCESS_GET_DATA,
            Provinsi::findOrFail($id, $isBps ? $this::COLUMN_GET_BPS : $this::COLUMN_GET_DAGRI)
        );
    }

    // {id, nama_bps}
    public function getListKabupatenBps(Request $req): JsonResponse
    {
        return $this->getListKabupaten($req, true);
    }

    public function getListKabupatenDagri(Request $req): JsonResponse
    {
        return $this->getListKabupaten($req, false);
    }

    private function getListKabupaten(Request $req, bool $isBps): JsonResponse
    {
        $validated = $req->validate(['provinsi_id' => 'required|string']);
        $data = Kabupaten::select($isBps ? $this::COLUMN_GET_LIST_BPS : $this::COLUMN_GET_LIST_DAGRI)
            ->where('provinsi_id', $validated['provinsi_id'])->get();

        return $this->responseHelper->success(
            $this->getRequestId(),
            'Successfully Get List Kabupaten',
            ResponseCode::SUCCESS_GET_DATA,
            $data
        );
    }


    // {id, kode_bps, nama_bps}
    public function getKabupatenBps(string $id): JsonResponse
    {
        return $this->getKabupaten($id, true);
    }

    public function getKabupatenDagri(string $id): JsonResponse
    {
        return $this->getKabupaten($id, false);
    }

    private function getKabupaten(string $id, bool $isBps): JsonResponse
    {
        return $this->responseHelper->success(
            $this->getRequestId(),
            'Successfully Get Kabupaten',
            ResponseCode::SUCCESS_GET_DATA,
            Kabupaten::findOrFail($id, $isBps ? $this::COLUMN_GET_BPS : $this::COLUMN_GET_DAGRI)
        );
    }

    // {id, nama_bps}
    public function getListKecamatanBps(Request $req): JsonResponse
    {
        return $this->getListKecamatan($req, true);
    }

    public function getListKecamatanDagri(Request $req): JsonResponse
    {
        return $this->getListKecamatan($req, false);
    }

    private function getListKecamatan(Request $req, bool $isBps): JsonResponse
    {
        $validated = $req->validate(['kabupaten_id' => 'required|string']);
        $data = Kecamatan::select($isBps ? $this::COLUMN_GET_LIST_BPS : $this::COLUMN_GET_LIST_DAGRI)
            ->where('kabupaten_id', $validated['kabupaten_id'])->get();

        return $this->responseHelper->success(
            $this->getRequestId(),
            'Successfully Get List Kecamatan',
            ResponseCode::SUCCESS_GET_DATA,
            $data
        );
    }

    // {id, kode_bps, nama_bps}
    public function getKecamatanBps(string $id): JsonResponse
    {
        return $this->getKecamatan($id, true);
    }

    public function getKecamatanDagri(string $id): JsonResponse
    {
        return $this->getKecamatan($id, false);
    }

    private function getKecamatan(string $id, bool $isBps): JsonResponse
    {
        return $this->responseHelper->success(
            $this->getRequestId(),
            'Successfully Get Kecamatan',
            ResponseCode::SUCCESS_GET_DATA,
            Kecamatan::findOrFail($id, $isBps ? $this::COLUMN_GET_BPS : $this::COLUMN_GET_DAGRI)
        );
    }

    // {id, nama_bps}
    public function getListDesaBps(Request $req): JsonResponse
    {
        return $this->getListDesa($req, true);
    }

    public function getListDesaDagri(Request $req): JsonResponse
    {
        return $this->getListDesa($req, false);
    }

    private function getListDesa(Request $req, bool $isBps): JsonResponse
    {
        $validated = $req->validate(['kecamatan_id' => 'required|string']);
        $data = Desa::select($isBps ? $this::COLUMN_GET_LIST_BPS : $this::COLUMN_GET_LIST_DAGRI)
            ->where('kecamatan_id', $validated['kecamatan_id'])->get();

        return $this->responseHelper->success(
            $this->getRequestId(),
            'Successfully Get List Desa',
            ResponseCode::SUCCESS_GET_DATA,
            $data
        );
    }

    // {id, kode_bps, nama_bps}
    public function getDesaBps(string $id): JsonResponse
    {
        return $this->getDesa($id, true);
    }

    public function getDesaDagri(string $id): JsonResponse
    {
        return $this->getDesa($id, false);
    }

    private function getDesa(string $id, bool $isBps): JsonResponse
    {
        return $this->responseHelper->success(
            $this->getRequestId(),
            'Successfully Get Desa',
            ResponseCode::SUCCESS_GET_DATA,
            Desa::findOrFail($id, $isBps ? $this::COLUMN_GET_BPS : $this::COLUMN_GET_DAGRI)
        );
    }
}
