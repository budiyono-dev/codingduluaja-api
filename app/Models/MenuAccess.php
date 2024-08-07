<?php

namespace App\Models;

use App\Constants\TableName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuAccess extends Model
{
    use HasFactory;

    protected $table = TableName::MENU_ACCESS;

    protected $fillable = ['name', 'description'];

    public function details()
    {
        return $this->hasMany(MenuAccessDetail::class);
    }
}
