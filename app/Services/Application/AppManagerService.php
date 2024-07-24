<?php

namespace App\Services\Application;

interface AppManagerService
{
    public function createToken(int $userId, int $resourceId, int $appClientId, int $expId);

    public function showToken(int $userId, int $resourceId, int $appClientId);

    public function revokeToken(int $userId, int $resourceId, int $appClientId);
}
