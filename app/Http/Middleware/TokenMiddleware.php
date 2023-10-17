<?php

namespace App\Http\Middleware;

use App\Exceptions\TokenException;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Jwt\JwtHelper;
use App\Helper\ResponseHelper;
use App\Models\ClientApp;
use App\Models\Token;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class TokenMiddleware
{
    public function __construct(protected JwtHelper $jwtHelper, protected ResponseHelper $responseHelper)
    {
    }

    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->hasHeader('x-authorization')) {
            return $this->responseHelper->unAutorizeResponse();
        }

        $authHeader = $request->header('x-authorization');
        $token = $this->getToken($authHeader);

        $appKey = $this->validateAndGetKey($token);

        Log::info("middleware validate token = {$token}");
        $this->jwtHelper->validateToken($token, $appKey);

        return $next($request);
    }

    private function getToken(string $authHeader) : string {
        $validPrefix = Str::startsWith($authHeader, 'Bearer ');
        if (!$validPrefix) {
            return throw new TokenException("token not found in header");
        }
        return Str::after($authHeader, 'Bearer ');
        
    }

    private function validateAndGetKey($token): string
    {
        $tokenModel = Token::select('identifier')->where('token', $token)->first();

        if (is_null($tokenModel)) {
            throw new TokenException("token indentifier not found");
        }

        $identifierSplit = Str::of($tokenModel->identifier)->explode(';');
        $clientApp = ClientApp::select('app_key')
            ->where('user_id', $identifierSplit[0])
            ->where('id', $identifierSplit[1])
            ->first();

        if (is_null($clientApp)) {
            throw new TokenException("token not mapped to any client app");
        }

        return $clientApp->app_key;
    }
}
