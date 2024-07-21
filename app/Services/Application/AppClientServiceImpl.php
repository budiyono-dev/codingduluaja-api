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
}
