<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\Wilayah\Provinsi;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    public function indexDagri()
    {
        $listProvinsi = Provinsi::all(['id', 'kode_dagri', 'nama_dagri']);
        // dd($listProvinsi->toArray());
        // foreach ($listProvinsi as $id => $p) {
        //     dd($p->id);
        // }
        return view('page.res.wilayah-bps', compact('listProvinsi'));
    }

    public function indexBps()
    {
    }
}
