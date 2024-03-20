<?php

namespace App\Models;

use App\Constants\TableName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = TableName::USERS;

    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'sex',
        'email',
        'password'
    ];

    public function getAuthPasswordName()
    {
        return 'password';
    }
}
