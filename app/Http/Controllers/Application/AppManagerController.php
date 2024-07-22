<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\ConnectedAppRequest;
use App\Services\Application\AppClientService;
use App\Services\Application\AppResourceService;

class AppManagerController extends Controller
{
    public function __construct(
        protected AppClientService $appClientService,
        protected AppResourceService $appResourceService
    ) {}

    public function index()
    {
        $listResource = $this->appResourceService->getClientResoureceView($this->authUserId());

        return view('page.app.app-manager', ['listResource' => $listResource]);
    }

    public function pageConnect(int $resourceId)
    {
        $listClient = $this->appClientService->getConnectedView($this->authUserId(), $resourceId);

        return view('page.app.app-manager-connect', ['listClient' => $listClient, 'resourceId' => $resourceId]);
    }

    public function doConnect(ConnectedAppRequest $request)
    {
        $req = $request->validated();
        $this->appResourceService->connectClient($this->authUserId(), $req['txtResourceId'], $req['selApp']);

        return redirect()->route('page.app.manager')->with('status', 'Success Connect Client|success');
    }
}
