<?php

namespace App\Services\Application;

interface AppResourceService
{
    public function getMasterResourceView(int $userId);

    public function addResource(int $userId, int $masterResource);

    public function getClientResourceByUserId(int $userId);

    public function getClientResoureceView(int $userId);

    public function deleteResouce(int $userId, int $clientResourceId);

    public function connectClient(int $userId, int $clientResourceId, int $clientAppId);

    public function disconnectClient(int $userId, int $clientResourceId, int $clientAppId);
}
