<?php

namespace App\Http\Controllers;

use App\Constants\TableNameConstant;
use App\Http\Requests\AddResourceRequest;
use App\Http\Requests\ConnectClientRequest;
use App\Models\AppClient;
use App\Models\ClientResource;
use Illuminate\Contracts\View\View;
use App\Models\MasterResource;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AppResourceController extends Controller
{
    public function index(): View
    {
        $tbConnClient = TableNameConstant::CONNECTED_APP;
        $tbAppClient = TableNameConstant::APP_CLIENT;
        $userId = Auth::user()->id;

        $idResource = ClientResource::select('master_resource_id')->where('user_id', )->get()->toArray();
        $listResource = ClientResource::with('masterResource', 'connectedApp')->get();
        // $listAppClient = DB::table($tbAppClient)
        //     ->join($tbConnClient, $tbConnClient.'.app_client_id', '=', $tbAppClient.'.id')
        //     ->select($tbAppClient.'.id', $tbAppClient.'.name')
        //     ->where($tbAppClient.'.user_id', $userId)
        //     ->get();
        $listAppClient = AppClient::select('id', 'name')->where('user_id', $userId)->get();
            
        // dd($listAppClient);

        // dd($listResource);
        
        $mapped = $listResource->map(function(ClientResource $r){
            $connectedApp = $r->connectedApp->map(function(AppClient $app){
                return (object) [
                    'id' => $app->id,
                    'name' => $app->name
                ];
            });
            return (object) [
                'id' => $r->id,
                'name' => $r->masterResource->name,
                'created_at' => $r->created_at,
                'connectedApp' => $connectedApp
            ];
        });

        $masterResource = '';
        if (!empty($idResource)) {
            $masterResource = MasterResource::whereNotIn('id', $idResource)->get();
        } else {
            $masterResource = MasterResource::all();
        }

        return view(
            'page.app-resource',
            [
                'listResource' => $mapped,
                'masterResource' => $masterResource,
                'listAppClient' => $listAppClient
            ]
        );
    }

    public function addResource(AddResourceRequest $req): RedirectResponse
    {
        DB::transaction(function () use ($req) {
            $validated = $req->validated();
            $userId = Auth::user()->id;

            $c = new ClientResource();
            $c->user_id = $userId;
            $c->master_resource_id = $validated['sel_m_resource'];

            $c->save();
        });

        return redirect()->route('page.appResource');
    }

    public function delete(int $id): RedirectResponse
    {
        DB::transaction(function () use ($id) {
            $appClient = ClientResource::find($id);
            $appClient->delete();
        });
        return redirect()->route('page.appResource');
    }

    public function connectClient(int $id, ConnectClientRequest $req): RedirectResponse
    {
        DB::transaction(function () use ($id, $req) {
            $appClient = ClientResource::find($id);
            $appClient->delete();
        });
        return redirect()->route('page.appResource');
    }

    public function disconnectClient(int $id): RedirectResponse
    {
        DB::transaction(function () use ($id) {
            $appClient = ClientResource::find($id);
            $appClient->delete();
        });
        return redirect()->route('page.appResource');
    }
}
