<?php

namespace App\Models;

use App\Constants\TableNameConstant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ClientApp extends Model
{
    use HasFactory;
    protected $table = TableNameConstant::CLIENT_APP;

    public function connectedClientResource(): BelongsToMany
    {
        return $this->belongsToMany(ClientResource::class, TableNameConstant::CONNECTED_APP, 'client_app_id', 'client_resource_id');
    }
}
