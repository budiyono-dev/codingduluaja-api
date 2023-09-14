<?php

namespace App\Models\Api;

use App\Constants\TableNameConstant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;
    protected $table = TableNameConstant::TODOLIST;
}
