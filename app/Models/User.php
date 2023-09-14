<?php

namespace App\Models;

use App\Constants\TableNameConstant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = TableNameConstant::USERS;

    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'sex',
        'email',
        'password'
    ];

}
