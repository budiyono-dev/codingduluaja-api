<?php

namespace App\Models;

use App\Constants\TableName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMenuAccess extends Model
{
    use HasFactory;

    protected $table = TableName::USER_MENU_ACCESS;

    protected $fillable = ['role_code', 'menu_access_id'];

    public function role()
    {
        return $this->belongsTo(UserRole::class, 'role_code', 'code');
    }

    public function menuAccess()
    {
        return $this->belongsTo(MenuAccess::class);
    }
}
