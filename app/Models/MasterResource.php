<?php

namespace App\Models;

use App\Constants\TableNameConstant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterResource extends Model
{
    use HasFactory;
    protected $table = TableNameConstant::MASTER_RESOURCE;

}
