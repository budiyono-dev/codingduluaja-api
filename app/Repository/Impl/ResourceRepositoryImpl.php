<?php

namespace App\Repository\Impl;

use App\Constants\TableName;
use App\Models\Api\Todolist;
use App\Models\Api\User\UserApi;
use App\Repository\ResourceRepository;
use Illuminate\Support\Facades\DB;

class ResourceRepositoryImpl implements ResourceRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getConnectedApp(int $masterResourceId)
    {
        return DB::table(TableName::MASTER_RESOURCE.' as m')
            ->join(TableName::CLIENT_RESOURCE.' as cr', 'm.id', '=', 'cr.master_resource_id')
            ->join(TableName::CONNECTED_APP.' as ca', 'cr.id', '=', 'ca.client_resource_id')
            ->where('m.id', $masterResourceId)->get();
    }

    public function findConnectedApp(int $resourceId, int $clientId, int $userId)
    {
        return DB::table('connected_app as con')
            ->join('client_app as ca', 'con.client_app_id', 'ca.id')
            ->join('client_resource as cr', 'con.client_resource_id', 'cr.id')
            ->where('con.client_resource_id', $resourceId)
            ->where('con.client_app_id', $clientId)
            ->where('ca.user_id', $userId)
            ->where('cr.user_id', $userId)
            ->get();
    }

    public function deleteTodolistByUserId($userId)
    {
        Todolist::query()->where('user_id', $userId)->delete();
    }

    public function deleteUserApiByUserId($userId)
    {
        $listUser = UserApi::query()->where('user_id', $userId)->get();
        foreach ($listUser as $user) {
            $user->address->delete();
            $user->image->delete();
            $user->delete();
        }
    }
}
