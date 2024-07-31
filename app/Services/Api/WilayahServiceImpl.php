<?php

namespace App\Services\Api;

use App\Models\Api\Wilayah\Desa;
use App\Models\Api\Wilayah\Kabupaten;
use App\Models\Api\Wilayah\Kecamatan;
use App\Models\Api\Wilayah\Provinsi;

class WilayahServiceImpl implements WilayahService
{
    private const COLUMN_BPS = ['id', 'kode_bps as kode', 'nama_bps as nama'];

    private const COLUMN_DAGRI = ['id', 'kode_dagri as kode', 'nama_dagri as nama'];

    private const COLUMN_GET_LIST_BPS = ['id', 'nama_bps as nama'];

    private const COLUMN_GET_LIST_DAGRI = ['id', 'nama_dagri as nama'];

    private const COLUMN_GET_BPS = ['id', 'kode_bps as kode', 'nama_bps as nama'];

    private const COLUMN_GET_DAGRI = ['id', 'kode_dagri as kode', 'nama_dagri as nama'];

    public function getProvinsiView(bool $isBps)
    {
        return Provinsi::all($this->column($isBps));
    }

    public function getKabupatenView(bool $isBps, int $provId)
    {
        return Kabupaten::where('provinsi_id', $provId)->select($this->column($isBps))->get();
    }

    public function getKecamatanView(bool $isBps, int $kabId)
    {
        return Kecamatan::where('kabupaten_id', $kabId)->select($this->column($isBps))->get();
    }

    public function getDesaView(bool $isBps, int $kecId)
    {
        return Desa::where('kecamatan_id', $kecId)->select($this->column($isBps))->get();
    }

    private function column(bool $isBps)
    {
        return $isBps ? $this::COLUMN_BPS : $this::COLUMN_DAGRI;
    }

    /**
     * service for api
     */
    private function columnList(bool $isBps)
    {
        return $isBps ? $this::COLUMN_GET_LIST_BPS : $this::COLUMN_GET_LIST_DAGRI;
    }

    private function columnGet(bool $isBps)
    {
        return $isBps ? $this::COLUMN_GET_BPS : $this::COLUMN_GET_DAGRI;
    }

    public function getListProvinsi(bool $isBps)
    {
        return Provinsi::all($this->columnList($isBps));
    }

    public function getProvinsi(string $id, bool $isBps)
    {
        return Provinsi::findOrFail($id, $this->columnGet($isBps));
    }

    public function getListKabupaten(string $provinsiId, bool $isBps)
    {
        return Kabupaten::select($this->columnList($isBps))->where('provinsi_id', $provinsiId)->get();
    }

    public function getKabupaten(string $id, bool $isBps)
    {
        return Kabupaten::findOrFail($id, $this->columnGet($isBps));
    }

    public function getListKecamatan(string $kabupatenId, bool $isBps)
    {
        return Kecamatan::select($this->columnList($isBps))->where('kabupaten_id', $kabupatenId)->get();
    }

    public function getKecamatan(string $id, bool $isBps)
    {
        return Kecamatan::findOrFail($id, $this->columnGet($isBps));
    }

    public function getListDesa(string $kecamatanId, bool $isBps)
    {
        return Desa::select($this->columnList($isBps))->where('kecamatan_id', $kecamatanId)->get();
    }

    public function getDesa(string $id, bool $isBps)
    {
        return Desa::findOrFail($id, $this->columnGet($isBps));
    }
}
