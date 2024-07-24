<?php

namespace App\Services\Application;

use App\Exceptions\WebException;
use App\Models\ClientResource;
use App\Models\MasterResource;

class AppResourceServiceImpl implements AppResourceService
{
    public function getMasterResourceView(int $userId)
    {
        $idMResource = ClientResource::select('master_resource_id')
            ->where('user_id', $userId)
            ->get();
        $masterResource = null;
        if ($idMResource->isNotEmpty()) {
            $masterResource = MasterResource::whereNotIn('id', $idMResource)->get();
        } else {
            $masterResource = MasterResource::all();
        }

        return $masterResource;
    }

    public function addResource(int $userId, int $masterResource)
    {
        $cr = new ClientResource;
        $cr->user_id = $userId;
        $cr->master_resource_id = $masterResource;
        $cr->save();
    }

    public function getClientResourceByUserId(int $userId)
    {
        return ClientResource::where('user_id', $userId)->with('masterResource')->get();
    }

    public function deleteResouce(int $userId, int $clientResourceId)
    {
        $cr = ClientResource::where('user_id', $userId)
            ->where('id', $clientResourceId)
            ->with('connectedApp')
            ->first();

        if (is_null($cr)) {
            abort(404);
        }
        if ($cr->connectedApp->isNotEmpty()) {
            throw WebException::resourceInUse('page.app.resource');
        }

        $cr->delete();
    }

    public function getClientResoureceView(int $userId)
    {
        return ClientResource::where('user_id', $userId)->with(['masterResource', 'connectedApp'])->get();
    }

    public function connectClient(int $userId, int $clientResourceId, int $clientAppId)
    {
        $cr = ClientResource::where('user_id', $userId)->where('id', $clientResourceId)->first();

        $cr->connectedApp()->attach($clientAppId);
    }

    public function disconnectClient(int $userId, int $clientResourceId, int $clientAppId)
    {
        $cr = ClientResource::where('user_id', $userId)->where('id', $clientResourceId)->first();

        $cr->connectedApp()->detach($clientAppId);
    }
}
