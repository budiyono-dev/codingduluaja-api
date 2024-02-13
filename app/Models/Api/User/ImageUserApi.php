<?php

namespace App\Models\Api\User;

use App\Constants\TableName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageUserApi extends Model
{
    use HasFactory;
    protected $table = TableName::IMAGE_USER_API;
}
