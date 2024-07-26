<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\ConnectedAppRequest;
use App\Http\Requests\Application\CreateTokenRequest;
use App\Http\Requests\Application\GetTokenRequest;
use App\Models\ExpiredToken;
use App\Services\Application\AppClientService;
use App\Services\Application\AppManagerService;
use App\Services\Application\AppResourceService;

class AppManagerController extends Controller
{
    public function __construct(
        protected AppClientService $appClientService,
        protected AppResourceService $appResourceService,
        protected AppManagerService $appManagerService
    ) {}

    public function index()
    {
        $listResource = $this->appResourceService->getClientResoureceView($this->authUserId());
        $expList = ExpiredToken::all();

        return view('page.app.app-manager', ['listResource' => $listResource, 'expList' => $expList]);
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

        return redirect()->route('app.manager')->with('status', 'Success Connect Client|success');
    }

    public function doShowToken(GetTokenRequest $request)
    {
        $req = $request->validated();
        $token = $this->appManagerService
            ->showToken($this->authUserId(), $req['txtResId'], $req['txtAppId']);

        return redirect()->route('app.manager')->with('token', $token);
    }

    public function doCreateToken(CreateTokenRequest $request)
    {
        $req = $request->validated();
        $token = $this->appManagerService->createToken(
            $this->authUserId(),
            $req['txtResId'],
            $req['txtAppId'],
            $req['selExp']);

        return redirect()->route('app.manager')->with('token', $token);
    }

    public function doRevokeToken(GetTokenRequest $request)
    {
        $req = $request->validated();
        $this->appManagerService
            ->revokeToken($this->authUserId(), $req['txtResId'], $req['txtAppId']);

        return redirect()->route('app.manager')->with('status', 'Success delete token|success');
    }

    public function doDisconnect(GetTokenRequest $request)
    {
        $req = $request->validated();
        $this->appResourceService->disconnectClient($this->authUserId(), $req['txtResId'], $req['txtAppId']);
        $this->appManagerService
            ->revokeToken($this->authUserId(), $req['txtResId'], $req['txtAppId']);

        return redirect()->route('app.manager')->with('status', 'Success Disconnect Client|success');
    }
}
