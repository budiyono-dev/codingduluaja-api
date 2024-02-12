<?php

namespace App\Services\Wilayah;

use Illuminate\Http\JsonResponse;

interface Wilayah
{
    public function getListProvinsi(bool $isBps): JsonResponse;
    public function getProvinsi(string $id, bool $isBps): JsonResponse;
    public function getListKabupaten(string $provinsiId, bool $isBps): JsonResponse;
    public function getKabupaten(string $id, bool $isBps): JsonResponse;
    public function getListKecamatan(string $kabupatenId, bool $isBps): JsonResponse;
    public function getKecamatan(string $id, bool $isBps): JsonResponse;
    public function getListDesa(string $kecamatanId, bool $isBps): JsonResponse;
    public function getDesa(string $id, bool $isBps): JsonResponse;
}
