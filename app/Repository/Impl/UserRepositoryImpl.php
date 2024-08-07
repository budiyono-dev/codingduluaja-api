<?php

namespace App\Repository\Impl;

use App\Models\User;
use App\Repository\UserRepository;

class UserRepositoryImpl implements UserRepository
{
    public function findById(int $id)
    {
        return User::find($id);
    }
}
