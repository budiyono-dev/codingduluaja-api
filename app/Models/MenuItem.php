<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'menu_item';
    protected $fillable = [
        'name', 'page', 'menu_parent_id'
    ];
}
