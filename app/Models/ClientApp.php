<?php

namespace App\Models;

use App\Constants\TableNameConstant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientApp extends Model
{
    use HasFactory;
    protected $table = TableNameConstant::CLIENT_APP;
}
