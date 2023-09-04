<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuParent extends Model
{
    use HasFactory;
    protected $table = 'menu_parent';
    protected $fillable = [
        'name', 'sequence'
    ];

    public function menuItem(): HasMany
    {
        return $this->hasMany(MenuItem::class);
    }
}
