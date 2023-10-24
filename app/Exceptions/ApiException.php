<?php

namespace App\Exceptions;

use App\Constants\ResponseCode;
use Exception;

class ApiException extends Exception
{
    protected int $httpCode;
    protected string $errorCode;

    public function __construct(int    $httpCode, string $errorCode,
                                string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        $this->httpCode = $httpCode;
        $this->errorCode = $errorCode;
        parent::__construct($message, $code, $previous);
    }

    public function getHttpCode(): int
    {
        return $this->httpCode;
    }

    public function getErrorCode(): string
    {
        return $this->errorCode;
    }

    public static function notFound(string $key = 'Data'): ApiException
    {
        return new static(404, ResponseCode::MODEL_NOT_FOUND, "{$key} Not Found");
    }

}
