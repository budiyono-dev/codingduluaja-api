<?php

namespace App\Repository\Impl;

use Illuminate\Support\Facades\DB;
use App\Constants\TableName;
use App\Models\Api\Todolist;
use App\Models\Api\User\UserApi;
use App\Models\User;
use App\Repository\MenuRepository;
use App\Repository\UserRepository;

class UserRepositoryImpl implements UserRepository
{
    public function findById(int $id) {
        return User::find($id);
    }

}
