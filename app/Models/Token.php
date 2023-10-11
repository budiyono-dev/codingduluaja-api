<?php

namespace App\Models;

use App\Constants\TableNameConstant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;
    protected $table = TableNameConstant::TOKEN;
    protected $fillable = [
        'token', 'exp', 'identifier'
    ];
}
