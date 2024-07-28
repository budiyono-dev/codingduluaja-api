<?php

namespace App\Http\Middleware;

use App\Exceptions\JwtException;
use App\Helper\ContextHelper;
use App\Helper\JwtHelper;
use App\Helper\ResponseHelper;
use App\Models\ClientApp;
use App\Models\ClientToken;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TokenMiddleware
{
    public function __construct(
        protected JwtHelper $jwtHelper,
        protected ResponseHelper $responseHelper) {}

    public function handle(Request $req, Closure $next)
    {
        if (! $req->hasHeader('Authorization')) {
            Log::error('[TOKEN-MIDDLEWARE] missing token');

            throw JwtException::unAuthorize();
        }
        $token = $req->header('Authorization');
        $cToken = ClientToken::find($token);

        Log::debug('[TOKEN-MIDDLEWARE] auth token', ['token' => $token]);

        if (is_null($cToken)) {
            Log::error('[TOKEN-MIDDLEWARE] token not found');

            throw JwtException::unAuthorize();
        }

        ContextHelper::initTokenContext(JWTHelper::extractIdentifier($cToken->identifier));
        $client = ClientApp::find(ContextHelper::getAppId());

        $decodeToken = JWTHelper::unpackToken($client->app_key, $cToken->value);
        if (is_null($decodeToken)) {
            Log::error('[TOKEN-MIDDLEWARE] invalid token');

            throw JwtException::unAuthorize();
        }

        Log::info('[TOKEN-MIDDLEWARE] decode token', ['jwt' => $decodeToken]);

        if (! JWTHelper::validateExp($decodeToken->exp)) {
            Log::error('[TOKEN-MIDDLEWARE] token expired');

            throw JwtException::unAuthorize();
        }

        return $next($req);
    }
}
