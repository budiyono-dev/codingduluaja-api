<?php

namespace App\Models;

use App\Constants\TableName;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;
    protected $table = TableName::USER_ROLE;
    protected $fillable = ['code', 'name'];
    protected $primaryKey = 'code';
	public $incrementing = false;


	public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
