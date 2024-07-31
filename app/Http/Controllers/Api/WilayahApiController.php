<?php

namespace App\Http\Controllers\Api;

use App\Constants\ResponseCode;
use App\Helper\ResponseBuilder;
use App\Http\Controllers\Controller;
use App\Services\Api\WilayahService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WilayahApiController extends Controller
{
    public function __construct(
        protected WilayahService $wilayahService
    ) {}

    public function getListProvinsiBps(): JsonResponse
    {
        return $this->formatResposne(
            'Successfully Get List Provinsi',
            $this->wilayahService->getListProvinsi(true)
        );
    }

    public function getListProvinsiDagri(): JsonResponse
    {
        return $this->formatResposne(
            'Successfully Get List Provinsi',
            $this->wilayahService->getListProvinsi(false)
        );
    }

    // {id, kode_bps, nama_bps}
    public function getProvinsiBps(string $id): JsonResponse
    {
        return $this->formatResposne(
            'Successfully Get Provinsi',
            $this->wilayahService->getProvinsi($id, true)
        );
    }

    public function getProvinsiDagri(string $id): JsonResponse
    {
        return $this->formatResposne(
            'Successfully Get Provinsi',
            $this->wilayahService->getProvinsi($id, false)
        );
    }

    // {id, nama_bps}
    public function getListKabupatenBps(Request $req): JsonResponse
    {
        return $this->formatResposne(
            'Successfully Get List Kabupaten',
            $this->wilayahService->getListKabupaten($this->validateRequiredField($req, 'provinsi_id'), true)
        );
    }

    public function getListKabupatenDagri(Request $req): JsonResponse
    {
        return $this->formatResposne(
            'Successfully Get List Kabupaten',
            ResponseCode::SUCCESS_GET_DATA,
            $this->wilayahService->getListKabupaten($this->validateRequiredField($req, 'provinsi_id'), false)
        );
    }

    // {id, kode_bps, nama_bps}
    public function getKabupatenBps(string $id): JsonResponse
    {
        return $this->formatResposne(
            'Successfully Get Kabupaten',
            $this->wilayahService->getKabupaten($id, true)
        );
    }

    public function getKabupatenDagri(string $id): JsonResponse
    {
        return $this->formatResposne(
            'Successfully Get Kabupaten',
            $this->wilayahService->getKabupaten($id, false)
        );
    }

    // {id, nama_bps}
    public function getListKecamatanBps(Request $req): JsonResponse
    {
        return $this->formatResposne(
            'Successfully Get List Kecamatan',
            $this->wilayahService->getListKecamatan($this->$this->validateRequiredField($req, 'kabupaten_id'), true)
        );
    }

    public function getListKecamatanDagri(Request $req): JsonResponse
    {
        return $this->formatResposne(
            'Successfully Get List Kecamatan',
            $this->wilayahService->getListKecamatan($this->$this->validateRequiredField($req, 'kabupaten_id'), false)
        );
    }

    // {id, kode_bps, nama_bps}
    public function getKecamatanBps(string $id): JsonResponse
    {
        return $this->formatResposne(
            'Successfully Get Kecamatan',
            $this->wilayahService->getKecamatan($id, true)
        );
    }

    public function getKecamatanDagri(string $id): JsonResponse
    {
        return $this->formatResposne(
            'Successfully Get Kecamatan',
            $this->wilayahService->getKecamatan($id, false)
        );
    }

    // {id, nama_bps}
    public function getListDesaBps(Request $req): JsonResponse
    {

        return $this->formatResposne(
            'Successfully Get List Desa',
            $this->wilayahService->getListDesa($this->validateRequiredField($req, 'kecamatan_id'), true)
        );
    }

    public function getListDesaDagri(Request $req): JsonResponse
    {
        return $this->formatResposne(
            'Successfully Get List Desa',
            $this->wilayahService->getListDesa($this->validateRequiredField($req, 'kecamatan_id'), false)
        );
    }

    // {id, kode_bps, nama_bps}
    public function getDesaBps(string $id): JsonResponse
    {
        return $this->formatResposne(
            'Successfully Get Desa',

            $this->wilayahService->getDesa($id, true)
        );
    }

    public function getDesaDagri(string $id): JsonResponse
    {
        return $this->formatResposne(
            'Successfully Get Desa',
            $this->wilayahService->getDesa($id, false)
        );
    }

    private function validateRequiredField(Request $req, string $field): string
    {
        $validated = $req->validate([$field => 'required|string']);

        return $validated['kabupaten_id'];
    }

    private function formatResposne(string $message, mixed $data)
    {
        return ResponseBuilder::success(
            $this->apiReqId(),
            $message,
            ResponseCode::SUCCESS_GET_DATA,
            $data
        );
    }
}
