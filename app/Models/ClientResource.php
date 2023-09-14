<?php

namespace App\Models;

use App\Constants\TableNameConstant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ClientResource extends Model
{
    use HasFactory;
    protected $table = TableNameConstant::CLIENT_RESOURCE;

    public function masterResource(): BelongsTo
    {
        return $this->belongsTo(MasterResource::class);
    }

    public function connectedApp(): BelongsToMany
    {
        return $this->belongsToMany(AppClient::class, TableNameConstant::CONNECTED_APP, 'id', 'app_client_id');
    }
}
