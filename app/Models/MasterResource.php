<?php

namespace App\Models;

use App\Constants\TableName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterResource extends Model
{
    use HasFactory;

    protected $table = TableName::MASTER_RESOURCE;

    protected $fillable = ['name', 'path'];
}
