<?php

namespace App\Http\Middleware;

use App\Constants\CdaContext;
use App\Helper\JwtHelper;
use App\Helper\ResponseHelper;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenMiddleware
{
    public function __construct(
        protected JwtHelper $jwtHelper,
        protected ResponseHelper $responseHelper) {}

    public function handle(Request $req, Closure $next): Response
    {
        if (! $request->hasHeader('Authorization')) {
            $apiCtx = $request->attributes->get(CdaContext::REQUEST_CTX);

            return $this->responseHelper->unAuthorize($apiCtx[CdaContext::REQUEST_ID]);
        }
    }
}
