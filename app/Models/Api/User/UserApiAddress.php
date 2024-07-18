<?php

namespace App\Models\Api\User;

use App\Constants\TableName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserApiAddress extends Model
{
    use HasFactory;

    protected $table = TableName::ADDRESS_USER_API;

    protected $fillable = ['user_api_id', 'country', 'state', 'city', 'postcode', 'detail'];
}
