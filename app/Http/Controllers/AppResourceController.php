<?php

namespace App\Http\Controllers;

use App\Constants\TableNameConstant;
use App\Http\Requests\AddResourceRequest;
use App\Models\AppClient;
use App\Models\ClientResource;
use Illuminate\Contracts\View\View;
use App\Models\MasterResource;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class AppResourceController extends Controller
{
    public function index(): View
    {
        $listResource = ClientResource::with('masterResource', 'connectedApp')->get();
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
        // dd($mapped);
        $masterResource = MasterResource::all();
        return view(
            'page.app-resource',
            [
                'listResource' => $mapped,
                'masterResource' => $masterResource
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
            $c->master_resource_id = $validated['sel-master-resource'];

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
}
