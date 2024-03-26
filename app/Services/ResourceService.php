<?php

namespace App\Services;

use App\Enums\MasterResource;

interface ResourceService
{
    public function isConnectedResource(MasterResource $resource): bool;
}
