<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Services\Application\AppResourceService;
use Illuminate\Http\Request;

class AppResourceController extends Controller
{
    public function __construct(
        protected AppResourceService $appResourceService
    ) {}

    public function index()
    {
        $listResource = $this->appResourceService->getClientResourceByUserId($this->authUserId());

        return view('page.app.app-resource', ['listResource' => $listResource]);
    }

    public function pageCreate()
    {
        $masterResource = $this->appResourceService->getMasterResourceView($this->authUserId());

        return view('page.app.app-resource-create', ['masterResource' => $masterResource]);
    }

    public function doCreate(Request $request)
    {
        $req = $request->validate([
            'selResource' => 'required|numeric|exists:master_resource,id',
        ]);
        $this->appResourceService->addResource($this->authUserId(), $req['selResource']);

        return redirect()->route('app.resource')->with('status', 'success add resource|success');
    }

    public function doDelete(Request $request)
    {
        $req = $request->validate([
            'txtId' => 'required|numeric|exists:client_resource,id',
        ]);
        $this->appResourceService->deleteResouce($this->authUserId(), $req['txtId']);

        return redirect()->route('app.resource')->with('status', 'success delete resource|success');
    }
}
