<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Constants\TableName;

class MenuAccessDetail extends Model
{
    use HasFactory;
    protected $table = TableName::MENU_ACCESS_DETAIL;
}
