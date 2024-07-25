<?php

use App\Http\Middleware\IsAdminMiddleware;
use App\Http\Middleware\MenuAccessMiddleware;
use App\Http\Middleware\RequestInfoMiddleware;
use App\Http\Middleware\TokenMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Log;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'isAdmin' => IsAdminMiddleware::class,
            'menuAccess' => MenuAccessMiddleware::class,
            'info' => RequestInfoMiddleware::class,
            'authToken' => TokenMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Exception $e, $request) {
            if (config('app.enable_api_debug_response') && $request->is('api/*')) {
                $reqId = $this->getRequestId();
                Log::info("[HANDLER] error 500 : {$e->getMessage()}, request_id : {$reqId}");

                return $this->responseHelper->serverError($reqId, ['error' => 'System Error']);
            }
        });
    })->create();
