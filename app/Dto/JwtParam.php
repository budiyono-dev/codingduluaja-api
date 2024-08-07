<?php

namespace App\Dto;

class JwtParam
{
    public function __construct(
        public int $userId,
        public int $clientId,
        public int $resourceId,
        public int $exp
    ) {}
}
