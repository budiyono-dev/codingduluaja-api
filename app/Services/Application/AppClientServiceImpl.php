<?php

namespace App\Services\Application;

use App\Models\ClientApp;
use Illuminate\Support\Str;

class AppClientServiceImpl implements AppClientService
{
    public function findByUserId(int $userId)
    {
        return ClientApp::where('user_id', $userId)->get();
    }

    public function createAppClient(int $userId, string $name, string $description)
    {
        $c = new ClientApp();
        $c->user_id = $userId;
        $c->name = $name;
        $c->description = $description;
        $c->app_key = md5($userId.Str::random(32));

        $c->save();
    }

    public function editAppClient(int $userId, int $appClientId, string $name, string $description)
    {
        $app = $this->findByUserIdAndAppClientId($userId, $appClientId);
        $app->name = $name;
        $app->description = $description;
        $app->save();
    }

    public function deleteAppClient(int $userId, int $appClientId)
    {
        $app = $this->findByUserIdAndAppClientId($userId, $appClientId);
        $connectedResource = $app->connectedClientResource;
        if ($connectedResource->isNotEmpty()) {
            return redirect()->route('page.app.client')->with('status', 'Application Already In Use|danger');
        }
        $app->delete();
    }

    public function findByUserIdAndAppClientId(int $userId, int $appClientId)
    {
        $app = ClientApp::where('id', $appClientId)->where('user_id', $userId)->first();

        if (is_null($app)) {
            abort(404);
        }

        return $app;
    }

    public function getConnectedView(int $userId, int $clientResource) {
        $connectedApp = \Illuminate\Support\Facades\DB::table("connected_app")
                ->where("client_resource_id", $clientResource)
                ->select('client_app_id')->get();
        $clientApp = ClientApp::where('user_id', $userId)
                ->whereNotIn('id', $connectedApp)
                ->get();
        
        return $clientApp;
    }
}
