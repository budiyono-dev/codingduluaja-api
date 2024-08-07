<?php

namespace App\Exceptions;

use App\Constants\ResponseCode;
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
        Log::error('[api.EXCEPTION] ', ['message' => $this->message]);
    }

    public static function notFound()
    {
        return new static(404, ResponseCode::NOT_FOUND, 'Data Not Found');
    }

    public static function forbidden(string $msg = 'Not Allowed Action')
    {
        return new static(403, ResponseCode::FORBIDDEN, $msg);
    }

    public static function systemError()
    {
        return new static(500, ResponseCode::INTERNAL_SERVER_ERROR, 'Internal System Error');
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
