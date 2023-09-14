<?php

namespace App\Models;

use App\Constants\TableNameConstant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppClient extends Model
{
    use HasFactory;
    protected $table = TableNameConstant::APP_CLIENT;
}
