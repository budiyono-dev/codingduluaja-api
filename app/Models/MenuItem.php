<?php

namespace App\Models;

use App\Constants\TableNameConstant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class MenuItem extends Model
{
    use HasFactory;
    protected $table = TableNameConstant::MENU_ITEM;
    protected $fillable = [
        'menu_parent_id', 'name', 'page', 'sequence'
    ];
    public function menuParent()
    {
        return $this->belongsTo(MenuItem::class);
    }
}
