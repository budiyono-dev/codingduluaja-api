<?php

namespace App\Models;

use App\Constants\TableName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;
    protected $table = TableName::TOKEN;
    protected $fillable = [
        'token', 'exp', 'identifier'
    ];
}
