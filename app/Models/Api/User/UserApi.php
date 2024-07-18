<?php

namespace App\Models\Api\User;

use App\Constants\TableName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserApi extends Model
{
    use HasFactory;

    protected $table = TableName::USER_API;

    protected $fillable = ['user_id', 'name', 'nik', 'phone', 'email'];

    public function address()
    {
        return $this->hasOne(UserApiAddress::class);
    }

    public function image()
    {
        return $this->hasOne(UserApiImage::class);
    }
}
