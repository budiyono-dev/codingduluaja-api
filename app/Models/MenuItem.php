<?php

namespace App\Models;

use App\Constants\TableName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $table = TableName::MENU_ITEM;

    protected $fillable = [
        'menu_parent_id', 'name', 'page', 'sequence',
    ];

    public function menuParent()
    {
        return $this->belongsTo(MenuItem::class);
    }
}
