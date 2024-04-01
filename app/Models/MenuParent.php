<?php

namespace App\Models;

use App\Constants\TableName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuParent extends Model
{
    use HasFactory;
    protected $table = TableName::MENU_PARENT;
    // protected $fillable = [
    //     'name', 'sequence'
    // ];

    public function menuItem(): HasMany
    {
        return $this->hasMany(MenuItem::class);
    }
}
