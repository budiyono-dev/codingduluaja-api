<?php

namespace App\Dto;

class ApiCtx
{
    public function __construct(
        public int $userId,
        public int $clientAppId,
        public int $clientResourceId
    ) {}
}
