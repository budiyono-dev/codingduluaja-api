<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Constants\ApiPath;
use Illuminate\Routing\Controller;

class DocController extends Controller
{
    private array $head = ['#','Field Name','Type','Length','Mandatory','Description'];

    public function todolist()
    {
        return view('page.doc.todolist', ['endpoint' => config('app.url')]);
    }
    public function wilayahBps()
    {
        return view('page.doc.wilayah', [
            'endpoint' => config('app.url') . '/api' . ApiPath::WILAYAH_BPS,
            'title' => 'Wilayah BPS',
            'jres' => $this->getWilayahJsonResponse(true)
        ]);
    }
    public function wilayahDagri()
    {
        return view('page.doc.wilayah', [
            'endpoint' => config('app.url') . '/api' . ApiPath::WILAYAH_DAGRI,
            'title' => 'Wilayah Dagri',
            'jres' => $this->getWilayahJsonResponse(false)
        ]);
    }
    public function userApi()
    {

        return view('page.doc.user-api', [
            'endpoint' => config('app.url') . '/api' . ApiPath::USER_API,
            'title' => 'User',
            'jres' => $this->getUserJsonResponse(),
            'tprop' => [
                'head' => $this->head
            ]
        ]);
    }

    private function getWilayahJsonResponse(bool $isBps): array
    {
        $pref = $isBps ? 'res.bps.' : 'res.dagri.';
        return [
            'listProvinsi' => __($pref . 'listProvinsi'),
            'detailProvinsi' => __($pref . 'detailProvinsi'),
            'listKabupaten' => __($pref . 'listKabupaten'),
            'detailKabupaten' => __($pref . 'detailKabupaten'),
            'listKecamatan' => __($pref . 'listKecamatan'),
            'detailKecamatan' => __($pref . 'detailKecamatan'),
            'listDesa' => __($pref . 'listDesa'),
            'detailDesa' => __($pref . 'detailDesa')
        ];
    }

    private function getUserJsonResponse(){
        return [
            'listUser' => __('listUser'),
            'createUser' => __('createUser'),
            'detailUser' => __('detailUser'),
            'updateUser' => __('updateUser'),
            'deleteUser' => __('deleteUser'),
            'updateImageUser' => __('updateImageUser'),
            'getImageUser' => __('getImageUser'),
        ];
    }
}
