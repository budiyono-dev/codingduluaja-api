<?php

namespace App\Http\Controllers;

use App\Constants\ApiPath;

class DocController extends Controller
{
    private array $head = ['#', 'Field Name', 'Type', 'Length', 'Mandatory', 'Description'];

    public function todolist()
    {
        return view('doc.todolist', ['endpoint' => config('app.url')]);
    }

    public function wilayahBps()
    {
        return view('page.doc.wilayah', [
            'endpoint' => config('app.url').'/api'.ApiPath::WILAYAH_BPS,
            'title' => 'Wilayah BPS',
            'jres' => $this->getWilayahJsonResponse(true),
        ]);
    }

    public function wilayahDagri()
    {
        return view('page.doc.wilayah', [
            'endpoint' => config('app.url').'/api'.ApiPath::WILAYAH_DAGRI,
            'title' => 'Wilayah Dagri',
            'jres' => $this->getWilayahJsonResponse(false),
        ]);
    }

    public function userApi()
    {
        $userSearchParam = [
            [1, 'search', 'string', '-', 'N', 'text to search'],
            [2, 'order_by', 'string', '-', 'N', 'ordering data by created_at (default), name or updated_at'],
            [3, 'search_by', 'string', '-', 'N', 'searching by name (default), nik, phone or email'],
            [4, 'order_direction', 'string', '-', 'N', 'ordering asc (ascending) or desc (descending)'],
            [5, 'page_size', 'string', '-', 'N', 'page size (3,5,10, or 20)'],
        ];
        $createUser = [
            [1, 'name', 'string', 'min:1,max:50', 'Y', 'name'],
            [2, 'nik', 'string', 'min:16,max:16', 'Y', '16 characters NIK'],
            [3, 'phone', 'string', 'max:20', 'N', 'phone number'],
            [4, 'email', 'string', 'max:20', 'Y', 'email address'],
            [5, 'country', 'string', 'min:1,max:50', 'N', 'country name'],
            [6, 'state', 'string', 'min:1,max:50', 'N', 'state name'],
            [7, 'city', 'string', 'min:1,max:50', 'N', 'city name'],
            [8, 'postcode', 'string', 'max:20', 'N', 'postal code'],
            [9, 'detail', 'string', 'max:255', 'N', 'detail address'],
        ];

        $updateImageUser = [
            [1, 'file', 'image:jpg,png', 'max:200kb', 'Y', 'Multipart/form-data for update user image'],
        ];

        return view('page.doc.user-api', [
            'endpoint' => config('app.url').'/api'.ApiPath::USER_API,
            'title' => 'User',
            'jres' => $this->getUserJsonResponse(),
            'tprop' => [
                'head' => $this->head,
                'userSearchParam' => $userSearchParam,
                'createUser' => $createUser,
                'updateImage' => $updateImageUser,
            ],
        ]);
    }

    private function getWilayahJsonResponse(bool $isBps): array
    {
        $pref = $isBps ? 'res.bps.' : 'res.dagri.';

        return [
            'listProvinsi' => __($pref.'listProvinsi'),
            'detailProvinsi' => __($pref.'detailProvinsi'),
            'listKabupaten' => __($pref.'listKabupaten'),
            'detailKabupaten' => __($pref.'detailKabupaten'),
            'listKecamatan' => __($pref.'listKecamatan'),
            'detailKecamatan' => __($pref.'detailKecamatan'),
            'listDesa' => __($pref.'listDesa'),
            'detailDesa' => __($pref.'detailDesa'),
        ];
    }

    private function getUserJsonResponse()
    {
        return [
            'list' => __('res.user.list'),
            'create' => __('res.user.create'),
            'reqCreate' => __('res.user.reqCreate'),
            'detail' => __('res.user.detail'),
            'update' => __('res.user.update'),
            'delete' => __('res.user.delete'),
            'reqUpdate' => __('res.user.reqUpdate'),
            'updateImage' => __('res.user.updateImage'),
        ];
    }
}
