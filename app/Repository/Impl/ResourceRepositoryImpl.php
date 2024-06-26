<?php

namespace App\Repository\Impl;

use App\Repository\ResourceRepository;
use Illuminate\Support\Facades\DB;
use App\Constants\TableName;
use App\Models\Api\Todolist;
use App\Models\Api\User\UserApi;

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
        return DB::table(TableName::MASTER_RESOURCE . ' as m')
            ->join(TableName::CLIENT_RESOURCE . ' as cr', 'm.id', '=', 'cr.master_resource_id')
            ->join(TableName::CONNECTED_APP . ' as ca', 'cr.id', '=', 'ca.client_resource_id')
            ->where('m.id', $masterResourceId)->get();
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
