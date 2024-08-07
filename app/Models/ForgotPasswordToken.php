<?php

namespace App\Models;

use App\Constants\TableName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForgotPasswordToken extends Model
{
    use HasFactory;

    protected $table = TableName::FORGOT_PASSWORD_TOKEN;

    protected $fillable = ['email', 'date', 'token', 'is_valid'];
}
