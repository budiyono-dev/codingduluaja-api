<?php

namespace App\Repository;

interface MenuRepository
{
    public function getConnectedApp(int $masterResourceId);
    public function deleteTodolistByUserId($userId);
    public function deleteUserApiByUserId($userId);
}
