<?php

namespace App\Repository;

interface UserRepository
{
    function findById(int $id);
}
