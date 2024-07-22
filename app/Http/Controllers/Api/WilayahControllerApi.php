<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Wilayah\Wilayah;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WilayahControllerApi extends Controller
{
    public function __construct(
        protected Wilayah $wilayah
    ) {}

    public function getListProvinsiBps(): JsonResponse
    {
        return $this->wilayah->getListProvinsi(true);
    }

    public function getListProvinsiDagri(): JsonResponse
    {
        return $this->wilayah->getListProvinsi(false);
    }

    // {id, kode_bps, nama_bps}
    public function getProvinsiBps(string $id): JsonResponse
    {
        return $this->wilayah->getProvinsi($id, true);
    }

    public function getProvinsiDagri(string $id): JsonResponse
    {
        return $this->wilayah->getProvinsi($id, false);
    }

    // {id, nama_bps}
    public function getListKabupatenBps(Request $req): JsonResponse
    {
        return $this->wilayah->getListKabupaten($this->validateRequiredField($req, 'provinsi_id'), true);
    }

    public function getListKabupatenDagri(Request $req): JsonResponse
    {
        return $this->wilayah->getListKabupaten($this->validateRequiredField($req, 'provinsi_id'), false);
    }

    // {id, kode_bps, nama_bps}
    public function getKabupatenBps(string $id): JsonResponse
    {
        return $this->wilayah->getKabupaten($id, true);
    }

    public function getKabupatenDagri(string $id): JsonResponse
    {
        return $this->wilayah->getKabupaten($id, false);
    }

    // {id, nama_bps}
    public function getListKecamatanBps(Request $req): JsonResponse
    {
        return $this->wilayah->getListKecamatan($this->$this->validateRequiredField($req, 'kabupaten_id'), true);
    }

    public function getListKecamatanDagri(Request $req): JsonResponse
    {
        return $this->wilayah->getListKecamatan($this->$this->validateRequiredField($req, 'kabupaten_id'), false);
    }

    // {id, kode_bps, nama_bps}
    public function getKecamatanBps(string $id): JsonResponse
    {
        return $this->wilayah->getKecamatan($id, true);
    }

    public function getKecamatanDagri(string $id): JsonResponse
    {
        return $this->wilayah->getKecamatan($id, false);
    }

    // {id, nama_bps}
    public function getListDesaBps(Request $req): JsonResponse
    {
        return $this->wilayah->getListDesa($this->validateRequiredField($req, 'kecamatan_id'), true);
    }

    public function getListDesaDagri(Request $req): JsonResponse
    {
        return $this->wilayah->getListDesa($this->validateRequiredField($req, 'kecamatan_id'), false);
    }

    // {id, kode_bps, nama_bps}
    public function getDesaBps(string $id): JsonResponse
    {
        return $this->wilayah->getDesa($id, true);
    }

    public function getDesaDagri(string $id): JsonResponse
    {
        return $this->wilayah->getDesa($id, false);
    }

    private function validateRequiredField(Request $req, string $field): string
    {
        $validated = $req->validate([$field => 'required|string']);

        return $validated['kabupaten_id'];
    }
}
