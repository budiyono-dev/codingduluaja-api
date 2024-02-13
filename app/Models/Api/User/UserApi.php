<?php

namespace App\Models\Api\User;

use App\Constants\TableName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserApi extends Model
{
    use HasFactory;
    protected $table = TableName::USER_API;

    public function address(){
        return $this->hasOne(AddressUserApi::class);
    }

    public function image(){
        return $this->hasOne(ImageUserApi::class);
    }

}
