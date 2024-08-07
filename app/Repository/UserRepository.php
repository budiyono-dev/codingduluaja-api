<?php

namespace App\Repository;

interface UserRepository
{
    public function findById(int $id);
}
