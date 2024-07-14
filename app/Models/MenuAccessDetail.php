<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Constants\TableName;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class MenuAccessDetail extends Model
{
    use HasFactory;
    protected $table = TableName::MENU_ACCESS_DETAIL;

    public function items()
    {
        return $this->hasMany(MenuItem::class);
    }

	public function menuAccess()
    {
        return $this->belongsTo(MenuAccess::class);
    }
}
