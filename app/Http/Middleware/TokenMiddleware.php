<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Jwt\JwtHelper;
use App\Helper\ResponseHelper;
use Symfony\Component\HttpFoundation\Response;

class TokenMiddleware
{
    public function __construct(protected JwtHelper $jwtHelper, protected ResponseHelper $responseHelper){}

    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->hasHeader('x-authorization')) {
            return $this->responseHelper->unAutorizeResponse();
        }

        // return response()->json([$request, $request->header('x-authorization')]);
        // $this->jwtHelper->
        return $next($request);
    }
}
