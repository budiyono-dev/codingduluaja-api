<?php

namespace App\Exceptions;

use App\Helper\ResponseHelper;
use Illuminate\Contracts\Container\Container;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

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
                Log::info("token exception {$e->getMessage()}");
                return $this->responseHelper->unAutorizeResponse();
            }
        });

        $this->renderable(function (\Exception $e, $request) {
            if ($request->is('api/*')) {
                return response()->json(['api response' => get_class($e)]);
            }
        });
    }
}
