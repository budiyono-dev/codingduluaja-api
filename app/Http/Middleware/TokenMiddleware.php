<?php

namespace App\Http\Middleware;

use App\Helper\ContextHelper;
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
        if (! $req->hasHeader('Authorization')) {
            return $this->responseHelper->unAuthorize(ContextHelper::getRequestId());
        }
    }
}
