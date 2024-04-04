<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Constants\TableName;
use Illuminate\Database\Eloquent\Relations\hasMany;

class MenuAccess extends Model
{
    use HasFactory;
    protected $table = TableName::MENU_ACCESS;

    public function detail()
    {
        return $this->hasMany(MenuAccessDetail::class);
    }
}
