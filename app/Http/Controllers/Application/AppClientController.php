<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\CreateAppClientRequest;
use App\Http\Requests\Application\EditAppClientRequest;
use App\Services\Application\AppClientService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AppClientController extends Controller
{
    public function __construct(protected AppClientService $appClientService) {}

    public function index()
    {
        return view('page.app.app-client',
            ['listClientApp' => $this->appClientService
                ->findByUserId($this->authUserId()),
            ]);
    }

    public function pageCreate()
    {
        return view('page.app.app-client-create');
    }

    public function doCreate(CreateAppClientRequest $request)
    {
        $req = $request->validated();
        Log::info('[CLIENT-APP] Create Client App '.json_encode($req));
        $this->appClientService
            ->createAppClient(
                $this->authUserId(),
                $req['txtName'],
                $req['txtDescription']
            );

        return redirect()->route('page.app.client')->with('status', 'success create app client|success');
    }

    public function doEdit(EditAppClientRequest $request)
    {
        $req = $request->validated();
        Log::info('[CLIENT-APP] Edit Client App '.json_encode($req));
        $this->appClientService
            ->editAppClient(
                $this->authUserId(),
                $req['txtId'],
                $req['txtName'],
                $req['txtDescription']
            );

        return redirect()->route('page.app.client')->with('status', 'success edit app client|success');
    }

    public function pageEdit(int $id)
    {
        $appClient = $this->appClientService
            ->findByUserIdAndAppClientId($this->authUserId(), $id);

        return view('page.app.app-client-edit', ['appClient' => $appClient]);
    }

    public function doDelete(Request $request)
    {
        $req = $request->validate(['txtId' => 'required|numeric']);
        //        try {
        $this->appClientService->deleteAppClient($this->authUserId(), $req['txtId']);
        //        } catch (WebException $e) {
        //            return redirect()->route('page.app.client')->with('status', "{$e->getMessage()}|danger");
        //        }

        return redirect()->route('page.app.client')->with('status', 'success delete app client|success');
    }
}
