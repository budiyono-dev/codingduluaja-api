<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SearchWilayahRequest;
use App\Models\Api\Wilayah\Desa;
use App\Models\Api\Wilayah\Kabupaten;
use App\Models\Api\Wilayah\Kecamatan;
use App\Models\Api\Wilayah\Provinsi;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    private const COLUMN_BPS = ['id', 'kode_bps', 'nama_bps'];
    private const COLUMN_DAGRI = ['id', 'kode_dagri', 'nama_dagri'];
    public function indexDagri(SearchWilayahRequest $req)
    {
        $data = ['title' => 'Wilayah Dagri'];
        $actionTurunan = [];
        $validated = $req->validated();
        if (array_key_exists('search', $validated)) {
            $search = $validated['search'];
            if ($search === 'kabupaten') {
                $data = array_merge($data, $this->getKabupaten($validated['provinsi_id'], false));
            } elseif ($search === 'kecamatan') {
                $data = array_merge($data, $this->getKecamatan($validated['kabupaten_id'], false));
            } elseif ($search === 'desa') {
                $data = array_merge($data, $this->getDesa($validated['kecamatan_id'], false));
            } else {
                $data = array_merge($data, $this->getProvinsi(false));
            }
        } else {
            $data = array_merge($data, $this->getProvinsi(false));
        }
        return view('page.res.wilayah-bps', $data);
    }
    public function getProvinsi(bool $isBps): array
    {
        return [
            'listWilayah' => Provinsi::all($isBps ? $this::COLUMN_BPS : $this::COLUMN_DAGRI),
            'actionTurunan' => $this->constructActionTurunan('Show Kabupaten', 'kabupaten', 'provinsi_id')
        ];
    }
    public function getKabupaten(string $provinsiId, bool $isBps)
    {
        return [
            'listWilayah' => Kabupaten::select($isBps ? $this::COLUMN_BPS : $this::COLUMN_DAGRI)
                ->where('provinsi_id', $provinsiId)
                ->get(),
            'actionTurunan' => $this->constructActionTurunan('Show Kecamatan', 'kecamatan', 'kabupaten_id')
        ];
    }
    public function getKecamatan(string $kabupatenId, bool $isBps)
    {
        return [
            'listWilayah' => Kecamatan::select($isBps ? $this::COLUMN_BPS : $this::COLUMN_DAGRI)
                ->where('kabupaten_id', $kabupatenId)
                ->get(),
            'actionTurunan' => $this->constructActionTurunan('Show Desa', 'desa', 'kecamatan_id')
        ];
    }

    public function getDesa(string $kecamatanId, bool $isBps)
    {
        return [
            'listWilayah' => Desa::select($isBps ? $this::COLUMN_BPS : $this::COLUMN_DAGRI)
                ->where('kecamatan_id', $kecamatanId)
                ->get(),
            'actionTurunan' => []
        ];
    }

    public function indexBps()
    {
    }

    private function constructActionTurunan(string $text, string $search, string $param): array
    {
        return [
            'text' => $text,
            'search' => '<input type="hidden" name="search" value="' . $search . '">',
            'param' => '<input type="hidden" name="' . $param . '" value=":id">',
            'url' => route('page.res.wilayahDagri')
        ];
    }
}
