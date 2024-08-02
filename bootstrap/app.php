<?php

use App\Helper\ContextHelper;
use App\Helper\ResponseBuilder;
use App\Http\Middleware\IsAdminMiddleware;
use App\Http\Middleware\MenuAccessMiddleware;
use App\Http\Middleware\RequestInfoMiddleware;
use App\Http\Middleware\TokenMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

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
        $exceptions->render(function (MethodNotAllowedHttpException $e, $request) {
            if (! config('app.api_debug') && $request->is('api/*')) {
                Log::error('[HANDLER] method not allowed ');

                return ResponseBuilder::methodNotAllowed();
            }
        });

        $exceptions->render(function (ValidationException $e, $request) {
            if (! config('app.api_debug') && $request->is('api/*')) {
                Log::error("[HANDLER] Validation Exception{$e->getMessage()} ");

                return ResponseBuilder::validationError(
                    ContextHelper::getRequestId(), $e->validator->errors()->all());
            }
        });

        $exceptions->render(function (Exception $e, $request) {
            if (! config('app.api_debug') && $request->is('api/*')) {
                Log::error("[HANDLER] error 500 : {$e->getMessage()}");

                return ResponseBuilder::serverError(ContextHelper::getRequestId());
            }
        });
    })->create();
