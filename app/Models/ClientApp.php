<?php

namespace App\Models;

use App\Constants\TableName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ClientApp extends Model
{
    use HasFactory;

    protected $table = TableName::CLIENT_APP;

    protected $fillable = ['user_id', 'name', 'app_key', 'description'];

    public function connectedClientResource(): BelongsToMany
    {
        return $this
            ->belongsToMany(ClientResource::class, TableName::CONNECTED_APP, 'client_app_id', 'client_resource_id');
    }
}
