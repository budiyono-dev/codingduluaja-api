<?php

namespace App\Exceptions;

use App\Constants\ResponseCode;

class JwtException extends ApiException
{
    public function __construct(
        int $httpCode,
        string $errorCode,
        string $message = '')
    {
        parent::__construct($httpCode, $errorCode, $message, 0, null);
    }

    public function render()
    {
        return parent::render();
    }

    public function report()
    {
        return parent::report();
    }

    public static function unAuthorize()
    {
        return new static(401, ResponseCode::UNAUTHORIZED, 'Unauthorized');
    }
}
