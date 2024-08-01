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

    public function getProvinsi(int $id, bool $isBps);

    public function getListKabupaten(int $provinsiId, bool $isBps);

    public function getKabupaten(int $id, bool $isBps);

    public function getListKecamatan(int $kabupatenId, bool $isBps);

    public function getKecamatan(int $id, bool $isBps);

    public function getListDesa(int $kecamatanId, bool $isBps);

    public function getDesa(int $id, bool $isBps);
}
