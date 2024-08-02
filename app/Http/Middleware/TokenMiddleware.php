<?php

namespace App\Http\Middleware;

use App\Exceptions\JwtException;
use App\Helper\ContextHelper;
use App\Helper\JwtHelper;
use App\Models\ClientApp;
use App\Models\ClientResource;
use App\Models\ClientToken;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class TokenMiddleware
{
    public function handle(Request $req, Closure $next)
    {
        if (! $req->hasHeader('Authorization')) {
            Log::error('[token.MIDDLEWARE] missing token');

            throw JwtException::unAuthorize();
        }
        $token = $req->header('Authorization');
        $cToken = ClientToken::find($token);

        Log::debug('[token.MIDDLEWARE] auth token', ['token' => $token]);

        if (is_null($cToken)) {
            Log::error('[token.MIDDLEWARE] token not found');

            throw JwtException::unAuthorize();
        }

        ContextHelper::initTokenContext(JwtHelper::extractIdentifier($cToken->identifier));
        $client = ClientApp::find(ContextHelper::getAppId());

        $decodeToken = JwtHelper::unpackToken($client->app_key, $cToken->value);
        if (is_null($decodeToken)) {
            Log::error('[token.MIDDLEWARE] invalid token');

            throw JwtException::unAuthorize();
        }

        Log::info('[token.MIDDLEWARE] decode token', ['jwt' => $decodeToken]);

        if (! JwtHelper::validateExp($decodeToken->exp)) {
            Log::error('[token.MIDDLEWARE] token expired');

            throw JwtException::unAuthorize();
        }

        $clientResource = ClientResource::find(ContextHelper::getResId())->with('masterResource')->first();
        $path = $clientResource->masterResource->path;
        $currentPath = Str::after(ContextHelper::getPath(), 'api');

        Log::debug("[token.MIDDLEWARE] {$path}  <= === => {$currentPath}");

        if (! Str::startsWith($currentPath, $path)) {
            Log::error('[token.MIDDLEWARE] mismatch token');

            throw JwtException::unAuthorize();
        }

        return $next($req);
    }
}
