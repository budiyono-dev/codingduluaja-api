<?php

namespace App\Services\Wilayah;

use App\Constants\ResponseCode;
use App\Helper\ResponseHelper;
use App\Models\Api\Wilayah\Desa;
use App\Models\Api\Wilayah\Kabupaten;
use App\Models\Api\Wilayah\Kecamatan;
use App\Models\Api\Wilayah\Provinsi;
use App\Traits\ApiContext;
use Illuminate\Http\JsonResponse;

class WilayahImpl implements Wilayah
{
    use ApiContext;

    public function __construct(
        protected ResponseHelper $responseHelper,
    ) {}

    private const COLUMN_GET_LIST_BPS = ['id', 'nama_bps as nama'];

    private const COLUMN_GET_LIST_DAGRI = ['id', 'nama_dagri as nama'];

    private const COLUMN_GET_BPS = ['id', 'kode_bps as kode', 'nama_bps as nama'];

    private const COLUMN_GET_DAGRI = ['id', 'kode_dagri as kode', 'nama_dagri as nama'];

    public function getListProvinsi(bool $isBps): JsonResponse
    {
        $data = Provinsi::all($isBps ? $this::COLUMN_GET_LIST_BPS : $this::COLUMN_GET_LIST_DAGRI);

        return $this->responseHelper->success(
            $this->getRequestId(),
            'Successfully Get List Provinsi',
            ResponseCode::SUCCESS_GET_DATA,
            $data
        );
    }

    public function getProvinsi(string $id, bool $isBps): JsonResponse
    {
        return $this->responseHelper->success(
            $this->getRequestId(),
            'Successfully Get Provinsi',
            ResponseCode::SUCCESS_GET_DATA,
            Provinsi::findOrFail($id, $isBps ? $this::COLUMN_GET_BPS : $this::COLUMN_GET_DAGRI)
        );
    }

    public function getListKabupaten(string $provinsiId, bool $isBps): JsonResponse
    {
        $data = Kabupaten::select($isBps ? $this::COLUMN_GET_LIST_BPS : $this::COLUMN_GET_LIST_DAGRI)
            ->where('provinsi_id', $provinsiId)->get();

        return $this->responseHelper->success(
            $this->getRequestId(),
            'Successfully Get List Kabupaten',
            ResponseCode::SUCCESS_GET_DATA,
            $data
        );
    }

    public function getKabupaten(string $id, bool $isBps): JsonResponse
    {
        return $this->responseHelper->success(
            $this->getRequestId(),
            'Successfully Get Kabupaten',
            ResponseCode::SUCCESS_GET_DATA,
            Kabupaten::findOrFail($id, $isBps ? $this::COLUMN_GET_BPS : $this::COLUMN_GET_DAGRI)
        );
    }

    public function getListKecamatan(string $kabupatenId, bool $isBps): JsonResponse
    {
        $data = Kecamatan::select($isBps ? $this::COLUMN_GET_LIST_BPS : $this::COLUMN_GET_LIST_DAGRI)
            ->where('kabupaten_id', $kabupatenId)->get();

        return $this->responseHelper->success(
            $this->getRequestId(),
            'Successfully Get List Kecamatan',
            ResponseCode::SUCCESS_GET_DATA,
            $data
        );
    }

    public function getKecamatan(string $id, bool $isBps): JsonResponse
    {
        return $this->responseHelper->success(
            $this->getRequestId(),
            'Successfully Get Kecamatan',
            ResponseCode::SUCCESS_GET_DATA,
            Kecamatan::findOrFail($id, $isBps ? $this::COLUMN_GET_BPS : $this::COLUMN_GET_DAGRI)
        );
    }

    public function getListDesa(string $kecamatanId, bool $isBps): JsonResponse
    {
        $data = Desa::select($isBps ? $this::COLUMN_GET_LIST_BPS : $this::COLUMN_GET_LIST_DAGRI)
            ->where('kecamatan_id', $kecamatanId)->get();

        return $this->responseHelper->success(
            $this->getRequestId(),
            'Successfully Get List Desa',
            ResponseCode::SUCCESS_GET_DATA,
            $data
        );
    }

    public function getDesa(string $id, bool $isBps): JsonResponse
    {
        return $this->responseHelper->success(
            $this->getRequestId(),
            'Successfully Get Desa',
            ResponseCode::SUCCESS_GET_DATA,
            Desa::findOrFail($id, $isBps ? $this::COLUMN_GET_BPS : $this::COLUMN_GET_DAGRI)
        );
    }
}
