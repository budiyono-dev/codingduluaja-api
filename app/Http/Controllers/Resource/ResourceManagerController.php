<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\DummyTodolistRequest;
use App\Services\Api\TodolistService;
use App\Services\Api\WilayahService;
use App\Services\Api\UserApiService;

class ResourceManagerController extends Controller
{
    public function __construct(
        protected TodolistService $todolistService,
        protected WilayahService $wilayahService,
        protected UserApiService $userApiService,    
    ) {}

    public function todolist()
    {

        return view('page.res.todolist',
            [
                'todolist' => $this->todolistService->getTodolistView($this->authUserId()),
            ]);
    }

    public function todolistDummy(DummyTodolistRequest $request)
    {
        $req = $request->validated();
        $this->todolistService->generateDummy($this->authUserId(), $req['sel_qty']);

        return redirect()->route('res.todolist')->with('status', 'success generate dummy data|success');
    }

    public function pageDummy()
    {
        return view('page.res.todolist-dummy');
    }

    public function indexBps()
    {
        return view('page.res.wilayah', [
            'title' => 'Wilayah BPS',
            'listWilayah' => $this->wilayahService->getProvinsiView(true),
            'action' => route('res.wilayahBps.kabupaten', ['id' => ':id']),
            'text' => 'Show Kabupaten',
        ]);
    }

    public function kabupatenBps(int $id)
    {
        return view('page.res.wilayah', [
            'title' => 'Wilayah BPS',
            'listWilayah' => $this->wilayahService->getKabupatenView(true, $id),
            'action' => route('res.wilayahBps.kecamatan', ['id' => ':id']),
            'text' => 'Show Kecamatan',
        ]);
    }

    public function kecamatanBps(int $id)
    {
        return view('page.res.wilayah', [
            'title' => 'Wilayah BPS',
            'listWilayah' => $this->wilayahService->getKecamatanView(true, $id),
            'action' => route('res.wilayahBps.desa', ['id' => ':id']),
            'text' => 'Show Desa',
        ]);
    }

    public function desaBps(int $id)
    {
        return view('page.res.wilayah', [
            'title' => 'Wilayah BPS',
            'listWilayah' => $this->wilayahService->getDesaView(true, $id),
            'action' => null,
            'text' => null,
        ]);
    }

    public function indexDagri()
    {
        return view('page.res.wilayah', [
            'title' => 'Wilayah BPS',
            'listWilayah' => $this->wilayahService->getProvinsiView(false),
            'action' => route('res.wilayahDagri.kabupaten', ['id' => ':id']),
            'text' => 'Show Kabupaten',
        ]);
    }

    public function kabupatenDagri(int $id)
    {
        return view('page.res.wilayah', [
            'title' => 'Wilayah BPS',
            'listWilayah' => $this->wilayahService->getKabupatenView(false, $id),
            'action' => route('res.wilayahDagri.kecamatan', ['id' => ':id']),
            'text' => 'Show Kecamatan',
        ]);
    }

    public function kecamatanDagri(int $id)
    {
        return view('page.res.wilayah', [
            'title' => 'Wilayah BPS',
            'listWilayah' => $this->wilayahService->getKecamatanView(false, $id),
            'action' => route('res.wilayahDagri.desa', ['id' => ':id']),
            'text' => 'Show Desa',
        ]);
    }

    public function desaDagri(int $id)
    {
        return view('page.res.wilayah', [
            'title' => 'Wilayah BPS',
            'listWilayah' => $this->wilayahService->getDesaView(false, $id),
            'action' => null,
            'text' => null,
        ]);
    }
    
    public function indexUserApi()
    {
        return view('page.res.user-api', [
            'title' => 'User API',
            'user' => $this->userApiService->getView($this->authUserId()),
        ]);
    }
}
