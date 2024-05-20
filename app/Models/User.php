<?php

namespace App\Models;

use App\Constants\TableName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\belongsTo;
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
        'password',
        'role_code'
    ];

    public function getAuthPasswordName()
    {
        return 'password';
    }

    public function role(){
        return $this->belongsTo(UserRole::class, 'role_code', 'code');
    }
}
