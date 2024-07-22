<?php

namespace App\Services\Application;

interface AppResourceService
{
    public function findByUserId(int $userId);

    public function createAppClient(int $userId, string $name, string $description);

    public function editAppClient(int $userId, int $appClientId, string $name, string $description);

    public function deleteAppClient(int $userId, int $appClientId);

    public function findByUserIdAndAppClientId(int $userId, int $appClientId);
}
