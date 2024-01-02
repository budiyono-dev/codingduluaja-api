<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Constants\ApiPath;

class DocController extends Controller
{
    /** GET List Provinsi
    GET Detail Provinsi
    GET List Kabupaten
    GET Detail Kabupaten
    GET List Kecamatan
    GET Detail Kecamatan
    GET List Desa
    GET Detail Desa
    */
    private array $responseJson = [
        'bps' => [
            'resGetListProvinsi'=> ,
            'resGetDetailProvinsi'=> ,
            'resGetListKabupaten'=> ,
            'resGetDetailKabupaten'=> ,
            'resGetListKecamatan'=> ,
            'resGetDetailKecamatan'=> ,
            'resGetListDesa'=> ,
            'resGetDetailDesa'=> ,
        ],
        'dagri' => [
            'resGetListProvinsi'=> ,
            'resGetDetailProvinsi'=> ,
            'resGetListKabupaten'=> ,
            'resGetDetailKabupaten'=> ,
            'resGetListKecamatan'=> ,
            'resGetDetailKecamatan'=> ,
            'resGetListDesa'=> ,
            'resGetDetailDesa'=> ,
        ],
    ];

    private string $resGetListProvinsi = '';
    private string $resGetDetailProvinsi = '';
    private string $resGetListKabupaten = '';
    private string $resGetDetailKabupaten = '';
    private string $resGetListKecamatan = '';
    private string $resGetDetailKecamatan = '';
    private string $resGetListDesa = '';
    private string $resGetDetailDesa = '';


    public function todolist()
    {
        return view('page.doc.todolist', ['endpoint' => config('app.url')]);
    }
    public function wilayahBps()
    {
        return view('page.doc.wilayah', ['endpoint' => config('app.url').'/api'.ApiPath::WILAYAH_BPS, 'title' => 'Wilayah BPS']);
    }
    public function wilayahDagri()
    {
        return view('page.doc.todolist', ['endpoint' => config('app.url').'/api'.ApiPath::WILAYAH_DAGRI, 'title' => 'Wilayah Dagri']);
    }
}
