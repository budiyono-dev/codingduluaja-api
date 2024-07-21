<?php

namespace App\Services\Application;

interface AppClientService
{
    public function findByUserId(int $userId);

    public function createAppClient(int $userId, string $name, string $description);
}
