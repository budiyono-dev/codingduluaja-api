<?php

namespace App\Models;

use App\Constants\TableName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuAccessDetail extends Model
{
    use HasFactory;

    protected $table = TableName::MENU_ACCESS_DETAIL;

    public function menuItem()
    {
        return $this->hasOne(MenuItem::class, 'id', 'menu_item_id');
    }

    public function menuAccess()
    {
        return $this->belongsTo(MenuAccess::class);
    }
}
