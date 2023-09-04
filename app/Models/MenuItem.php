<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belonngsTo;

class MenuItem extends Model
{
    use HasFactory;
    protected $table = 'menu_item';
    protected $fillable = [
        'menu_parent_id', 'name', 'page', 'sequence'
    ];
    public function menuParent()
    {
        return $this->belongsTo(MenuItem::class);
    }
}
