<?php

namespace App\Models;

use App\Constants\TableName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientToken extends Model
{
    use HasFactory;

    protected $table = TableName::CLIENT_TOKEN;

    protected $primaryKey = 'key';

    protected $keyType = 'string';

    public $incrementing = false;

    public function isExpired(): bool
    {
        return $this->exp >= time();
    }
}
