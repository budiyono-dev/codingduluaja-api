<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SearchWilayahRequest;
use App\Models\Api\Wilayah\Desa;
use App\Models\Api\Wilayah\Kabupaten;
use App\Models\Api\Wilayah\Kecamatan;
use App\Models\Api\Wilayah\Provinsi;

class WilayahController extends Controller
{
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
    private function getWilayah(SearchWilayahRequest $req, bool $isBps)
    {
        $title = $isBps ? 'Wilayah BPS' : 'Wilayah Dagri';
        $column = $isBps ? $this::COLUMN_BPS : $this::COLUMN_DAGRI;
        $url = $isBps ? route('page.res.wilayahBps') : route('page.res.wilayahDagri');
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
        // dd($title, $listWilayah, $actionTurunan);
        return view('page.res.wilayah-bps', ['title' => $title, 'listWilayah' => $listWilayah, 'actionTurunan' => $actionTurunan]);
    }
    private function getProvinsi(array $column, string $url)
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
