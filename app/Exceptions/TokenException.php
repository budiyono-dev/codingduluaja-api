<?php

namespace App\Exceptions;

use Exception;

class TokenException extends Exception
{
    public static function limit(): TokenException
    {
        return new static('Token Limit Exceeded');
    }

    public static function notFound(): TokenException
    {
        return new static('Token Not Found');
    }

    public static function missing(): TokenException
    {
        return new static('Token Is Missing');
    }

    public static function unMapped(): TokenException
    {
        return new static('Token Not Mapped To Any Client');
    }

    public static function invalid(): TokenException
    {
        return new static('Invalid Token');
    }

    public static function expired(): TokenException
    {
        return new static('Token Expired');
    }
}
