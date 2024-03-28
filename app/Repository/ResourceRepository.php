<?php

namespace App\Repository;

interface ResourceRepository
{
    public function getConnectedApp(int $masterResourceId);
    public function deleteTodolistByUserId($userId);
    public function deleteUserApiByUserId($userId);
}
