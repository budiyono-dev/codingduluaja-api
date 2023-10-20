<?php

namespace App\Http\Middleware;

use App\Constants\CtxConstant;
use App\Dto\ApiCtx;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class RequestInfoMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        $reqId = Str::uuid()->toString();
        Log::info("request : {$reqId}");
        $request->attributes->add(
            [
                CtxConstant::REQUEST_CTX => [
                    CtxConstant::REQUEST_ID => $reqId
                ]
            ]
        );
        return $next($request);
    }
}
