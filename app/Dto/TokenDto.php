<?php
namespace App\Dto;

use App\Models\Token;

class TokenDto
{
    public function __construct
    (
        public int $id,
        public string $token,
        public int $exp,
        public bool $isExpired
    ){}

    public static function fromToken(Token $token): TokenDto
    {
        return new TokenDto($token->id, $token->token, $token->exp, $token->exp >= time() ? false : true);
    }
}
