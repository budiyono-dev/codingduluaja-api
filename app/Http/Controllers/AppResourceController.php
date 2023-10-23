<?php

namespace App\Http\Controllers;

use App\Constants\TableName;
use App\Http\Requests\AddResourceRequest;
use App\Http\Requests\ConnectClientRequest;
use App\Http\Requests\DisconnectClientRequest;
use App\Models\ClientApp;
use App\Models\ClientResource;
use App\Models\MasterResource;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class AppResourceController extends Controller
{
    public function index(): View
    {
        $userId = Auth::user()->id;

        $idResource = ClientResource::select('master_resource_id')->where('user_id', )->get()->toArray();
        $listResource = ClientResource::with('masterResource', 'connectedApp')->get();
        $listClientApp = ClientApp::select('id', 'name')->where('user_id', $userId)->get();

        $mapped = $listResource->map(function(ClientResource $r){
            $connectedApp = $r->connectedApp->map(function(ClientApp $app){
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
                'listClientApp' => $listClientApp
            ]
        );
    }

    public function addResource(AddResourceRequest $req): RedirectResponse
    {
        Log::info('Add Resource');
        DB::transaction(function () use ($req) {
            $validated = $req->validated();
            $userId = Auth::user()->id;

            $c = new ClientResource();
            $c->user_id = $userId;
            $c->master_resource_id = $validated['sel_m_resource'];

            $c->save();
            Log::info($c);
        });

        return redirect()->route('page.appResource');
    }

    public function delete(int $id): RedirectResponse
    {
        Log::info("Delete Resource : {$id}");
        DB::transaction(function () use ($id) {
            $clientResource = ClientResource::findOrFail($id);
            DB::table(TableName::CONNECTED_APP)
                ->where('client_resource_id', $clientResource->id)
                ->delete();
            $clientResource->delete();
        });
        return redirect()->route('page.appResource');
    }

    public function connectClient(int $id, ConnectClientRequest $req): RedirectResponse
    {
        Log::info('Connect Client To Resource');
        DB::transaction(function () use ($id, $req) {
            $validReq = $req->validated();
            $userId = Auth::user()->id;
            // dd($id, $req);
            $now = Carbon::now();
            $clientResource = ClientResource::findOrFail($id);

            Log::info("'connect client {$validReq['sel_client']} to resource {$id}");

            DB::table(TableName::CONNECTED_APP)
                ->insert([
                    'client_resource_id' => $id,
                    'client_app_id' => $validReq['sel_client'],
                    'created_at'=> $now,
                    'updated_at'=> $now
                ]);
        });
        return redirect()->route('page.appResource');
    }

    public function disconnectClient(int $id, DisconnectClientRequest $req): RedirectResponse
    {
        Log::info('Disconnect Client from Resource');
        DB::transaction(function () use ($id, $req) {
            $validReq = $req->validated();

            $clientResource = ClientResource::findOrFail($id);

            Log::info("disconnect client {$validReq['client_id']} from resource {$id}");

            DB::table(TableName::CONNECTED_APP)
                ->where('client_resource_id', $id)
                ->where('client_app_id', $validReq['client_id'])
                ->delete();
        });
        return redirect()->route('page.appResource');
    }
}
