<?php

namespace App\Services\Api;

interface WilayahService
{
    public function getProvinsiView(bool $isBps);

    public function getKabupatenView(bool $isBps, int $provId);

    public function getKecamatanView(bool $isBps, int $kabId);

    public function getDesaView(bool $isBps, int $kecId);

    /**
     * service for api
     */
    public function getListProvinsi(bool $isBps);

    public function getProvinsi(string $id, bool $isBps);

    public function getListKabupaten(string $provinsiId, bool $isBps);

    public function getKabupaten(string $id, bool $isBps);

    public function getListKecamatan(string $kabupatenId, bool $isBps);

    public function getKecamatan(string $id, bool $isBps);

    public function getListDesa(string $kecamatanId, bool $isBps);

    public function getDesa(string $id, bool $isBps);
}
