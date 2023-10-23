<?php

namespace App\Exceptions;

use App\Helper\ResponseHelper;
use App\Traits\ApiContext;
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
    use ApiContext;
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
                Log::info("token exception = {$e->getMessage()}");
                return $this->responseHelper->unAuthorize($this->getRequestId());
            }
        });

        $this->renderable(function (Exception $e, $request) {
            if ($request->is('api/*')) {
                $reqId = $this->getRequestId();
                Log::info("error 500 : {$e->getMessage()}, request_id : {$reqId}");
                return $this->responseHelper->serverError($reqId, ['error' => 'System Error']);
            }
        });
    }
}
