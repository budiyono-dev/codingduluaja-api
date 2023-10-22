<?php

namespace App\Models;

use App\Constants\TableName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ClientResource extends Model
{
    use HasFactory;
    protected $table = TableName::CLIENT_RESOURCE;

    public function masterResource(): BelongsTo
    {
        return $this->belongsTo(MasterResource::class);
    }

    public function connectedApp(): BelongsToMany
    {
        return $this->belongsToMany(ClientApp::class, TableName::CONNECTED_APP, 'client_resource_id', 'client_app_id');
    }
}
