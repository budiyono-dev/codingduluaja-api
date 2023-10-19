<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class RequestInfoMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        $reqId = Str::uuid();
        Log::info("request : {$reqId}");
        dd($request);
        $request->merge(['reqCtx' => ['reqId' => $reqId]]);
        return response()->json('ok');
        return $next($request);
    }
}
