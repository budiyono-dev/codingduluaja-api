<?php

namespace App\Repository;

interface TokenRepository
{
    public function findByIdentifier(int $userId, string $identifier);

    public function countByIdentifier(int $userId, string $identifier);
}
