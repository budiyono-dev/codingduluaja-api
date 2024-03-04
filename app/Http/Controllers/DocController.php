<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Constants\ApiPath;
use Illuminate\Routing\Controller;

class DocController extends Controller
{
    public function todolist()
    {
        return view('page.doc.todolist', ['endpoint' => config('app.url')]);
    }
    public function wilayahBps()
    {
        return view('page.doc.wilayah', [
            'endpoint' => config('app.url') . '/api' . ApiPath::WILAYAH_BPS,
            'title' => 'Wilayah BPS',
            'jsonResponse' => $this->getWilayahJsonResponse(true)
        ]);
    }
    public function wilayahDagri()
    {
        return view('page.doc.wilayah', [
            'endpoint' => config('app.url') . '/api' . ApiPath::WILAYAH_DAGRI,
            'title' => 'Wilayah Dagri',
            'jsonResponse' => $this->getWilayahJsonResponse(false)
        ]);
    }
    public function userApi()
    {
        return view('page.doc.user-api', [
            'endpoint' => config('app.url') . '/api' . ApiPath::USER_API,
            'title' => 'User',
            'jsonResponse' => null
        ]);
    }

    private function getWilayahJsonResponse(bool $isBps): array
    {
        return [
            'resGetListProvinsi' => $isBps
                ? __('responsejson.bps.resGetListProvinsi')
                :  __('responsejson.dagri.resGetListProvinsi'),
            'resGetDetailProvinsi' => $isBps
                ? __('responsejson.bps.resGetDetailProvinsi')
                :  __('responsejson.dagri.resGetDetailProvinsi'),
            'resGetListKabupaten' => $isBps
                ? __('responsejson.bps.resGetListKabupaten')
                :  __('responsejson.dagri.resGetListKabupaten'),
            'resGetDetailKabupaten' => $isBps
                ? __('responsejson.bps.resGetDetailKabupaten')
                :  __('responsejson.dagri.resGetDetailKabupaten'),
            'resGetListKecamatan' => $isBps
                ? __('responsejson.bps.resGetListKecamatan')
                :  __('responsejson.dagri.resGetListKecamatan'),
            'resGetDetailKecamatan' => $isBps
                ? __('responsejson.bps.resGetDetailKecamatan')
                :  __('responsejson.dagri.resGetDetailKecamatan'),
            'resGetListDesa' => $isBps
                ? __('responsejson.bps.resGetListDesa')
                :  __('responsejson.dagri.resGetListDesa'),
            'resGetDetailDesa' => $isBps
                ? __('responsejson.bps.resGetDetailDesa')
                :  __('responsejson.dagri.resGetDetailDesa')
        ];
    }
}
