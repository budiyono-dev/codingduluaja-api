<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpiredAppToken extends Model
{
    use HasFactory;
    protected $table = 'expired_app_token';
}