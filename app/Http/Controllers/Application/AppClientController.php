<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\CreateAppClientRequest;
use App\Services\Application\AppClientService;
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
        return view('page.app.create-app-client');
    }

    public function doCreate(CreateAppClientRequest $request)
    {
        $req = $request->validated();
        Log::info("[CLIENT-APP] Create Client App ".json_encode($req));
        $this->appClientService
            ->createAppClient(
                $this->authUserId(),
                $req['txtName'],
                $req['txtDescription']
            );

        return redirect()->route('page.app.client');
    }
}
