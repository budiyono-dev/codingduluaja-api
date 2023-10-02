<?php

namespace App\Models;

use App\Constants\TableNameConstant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpiredToken extends Model
{
    use HasFactory;
    protected $table = TableNameConstant::EXPIRED_TOKEN;
    protected $fillable = [
        'exp_value', 'unit'
    ];
}
