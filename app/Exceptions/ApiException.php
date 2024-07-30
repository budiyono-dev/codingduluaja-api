<?php

namespace App\Exceptions;

use App\Helper\ContextHelper;
use App\Helper\ResponseBuilder;
use Exception;
use Illuminate\Support\Facades\Log;
use Throwable;

class ApiException extends Exception
{
    protected int $httpCode;

    protected string $errorCode;

    public function __construct(int $httpCode, string $errorCode,
        string $message = '', int $code = 0, ?Throwable $previous = null)
    {
        $this->httpCode = $httpCode;
        $this->errorCode = $errorCode;
        parent::__construct($message, $code, $previous);
    }

    public function report()
    {
        Log::error('[API-EXCEPTION] ', ['message' => $this->message]);
    }

    public function render()
    {
        return ResponseBuilder::buildJson(
            ContextHelper::getRequestId(),
            false,
            $this->message,
            $this->errorCode,
            $this->httpCode,
            null
        );
    }
}
