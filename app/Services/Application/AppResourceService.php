<?php

namespace App\Services\Application;

interface AppResourceService
{
    public function getMasterResourceView(int $userId);

    public function addResource(int $userId, int $masterResource);

    public function getClientResourceByUserId(int $userId);

    public function getClientResoureceView(int $userId);

    public function deleteResouce(int $userId, int $clientResourceId);
}
