<?php

namespace App\Exceptions;

use App\Helper\ResponseHelper;
use Illuminate\Contracts\Container\Container;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Constants\CdaContext;
use Throwable;
use Exception;

class Handler extends ExceptionHandler
{
    public function __construct(Container $container, private ResponseHelper $responseHelper)
    {
        parent::__construct($container);
    }

    protected $levels = [
        //
    ];

    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {

        $this->renderable(function (TokenException $e, $request) {
            if ($request->is('api/*')) {
                $reqId = $request->attributes->get(CdaContext::REQUEST_CTX)['request_id'];
                Log::info("token exception = {$e->getMessage()}");
                return $this->responseHelper->unAuthorize($reqId);
            }
        });

        $this->renderable(function (Exception $e, $request) {
            if ($request->is('api/*')) {
                $reqId = $request->attributes->get(Context::REQUEST_CTX)['request_id'];
                Log::info("error 500 : {$e->getMessage()}, request_id : {$reqId}");
                return $this->responseHelper->serverError($reqId, ['error' => 'System Error']);
            }
        });
    }
}
