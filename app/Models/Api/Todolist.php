<?php

namespace App\Models\Api;

use App\Constants\TableName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;

    protected $table = TableName::TODOLIST;

    protected $fillable = ['user_id', 'date', 'name', 'description'];
}
