<?php

namespace App\Repository\Impl;

use App\Models\ClientToken;
use App\Repository\TokenRepository;

class TokenRepositoryImpl implements TokenRepository
{
    public function findByIdentifier(int $userId, string $identifier)
    {
        return ClientToken::where('identifier', $identifier)->where('is_active', true)->first();
    }

    public function countByIdentifier(int $userId, string $identifier)
    {
        return ClientToken::where('identifier', $identifier)->where('is_active', true)->count();
    }
}
