<?php

namespace App\Repository;

interface ResourceRepository
{
    public function getConnectedApp(int $masterResourceId);

    public function deleteTodolistByUserId($userId);

    public function deleteUserApiByUserId($userId);

    public function findConnectedApp(int $resourceId, int $clientId, int $userId);
}
