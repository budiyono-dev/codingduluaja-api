<?php

namespace App\Services;

use App\Enums\MasterResourceType;

interface ResourceService
{
    public function isConnectedResource(MasterResourceType $resource): bool;
}
