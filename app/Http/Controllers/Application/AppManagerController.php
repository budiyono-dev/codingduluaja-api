<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\ConnectedAppRequest;
use App\Http\Requests\Application\CreateTokenRequest;
use App\Services\Application\AppClientService;
use App\Services\Application\AppResourceService;
use Illuminate\Http\Request;

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

    public function doCreateToken(CreateTokenRequest $request)
    {
        $req = $request->validated();
        $connectedApp = \Illuminate\Support\Facade\DB::table('connected_app')
            ->where('client_resource_id', $req['txtResourceId'])
            ->where('client_app_id', $req['txtAppId'])
            ->get();

        if (is_null($connectedApp)) {
            abort(404);
        }

        \App\Helper\JwtHelper::expToUnixTime();
    }

    public function doRevokeToken(Request $request)
    {
        //asds
    }
}
