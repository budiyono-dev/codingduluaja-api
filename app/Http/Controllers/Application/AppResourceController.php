<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;

class AppResourceController extends Controller
{
    public function __construct(
        protected ResourceService $resourceService
    ) {}

    public function index(): View
    {
        $userId = Auth::user()->id;

        $idResource = ClientResource::select('master_resource_id')->where('user_id', $userId)->get()->toArray();
        $listResource = ClientResource::with('masterResource', 'connectedApp')->get();
        $listClientApp = ClientApp::select('id', 'name')->where('user_id', $userId)->get();

        $mapped = $listResource->map(function (ClientResource $r) {
            $connectedApp = $r->connectedApp->map(function (ClientApp $app) {
                return (object) [
                    'id' => $app->id,
                    'name' => $app->name,
                ];
            });

            return (object) [
                'id' => $r->id,
                'name' => $r->masterResource->name,
                'created_at' => $r->created_at,
                'connectedApp' => $connectedApp,
            ];
        });

        $masterResource = '';
        if (! empty($idResource)) {
            $masterResource = MasterResource::whereNotIn('id', $idResource)->get();
        } else {
            $masterResource = MasterResource::all();
        }

        return view(
            'page.app-resource',
            [
                'listResource' => $mapped,
                'masterResource' => $masterResource,
                'listClientApp' => $listClientApp,
            ]
        );
    }
}
