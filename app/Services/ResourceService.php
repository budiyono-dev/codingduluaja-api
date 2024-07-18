<?php

namespace App\Services;

use App\Enums\MasterResourceType;

interface ResourceService
{
    public function isConnectedResource(MasterResourceType $resource): bool;

    public function getMasterResourceTableName(int $id): string;

    public function clearResource(int $userId, int $masterResourceId): void;
}
