<?php

namespace App\Http\Middleware;

use App\Constants\CdaContext;
use App\Dto\ApiCtx;
use App\Exceptions\TokenException;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Jwt\JwtHelper;
use App\Helper\ResponseHelper;
use App\Models\ClientApp;
use App\Models\Token;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use App\Constants\TableName;

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

        $appKey = $this->validate($request, $token);

        Log::info("middleware validate token = {$token}");
        $this->jwtHelper->validateToken($token, $appKey);

        return $next($request);
    }

    private function getToken(string $authHeader) : string {
        $validPrefix = Str::startsWith($authHeader, 'Bearer ');
        if (!$validPrefix) {
            throw TokenException::missing();
        }
        return Str::after($authHeader, 'Bearer ');

    }

    private function validate(Request $req, string $token): string
    {
        $tokenModel = Token::select('identifier')->where('token', $token)->first();

        if (is_null($tokenModel)) {
            throw TokenException::notFound();
        }

        $identifierSplit = Str::of($tokenModel->identifier)->explode(';');
        $userId = $identifierSplit[0];
        $clientAppId = $identifierSplit[1];
        $clientResourceId = $identifierSplit[2];

        $appKey = DB::table(TableName::CLIENT_APP.' as ap')
        ->join(TableName::CONNECTED_APP.' as con', 'ap.id', '=', 'con.client_app_id')
        ->where('ap.user_id', $userId)
        ->where('ap.id', $clientAppId)
        ->where('con.client_resource_id', $clientResourceId)
        ->select('ap.app_key')
        ->get();

        // $clientApp = ClientApp::where('user_id', $userId)
        //     ->where('id', $clientAppId)
        //     ->first();

        Log::info('appkey ========= '.$appKey);

        if ($appKey->isEmpty()) {
            throw TokenException::unMapped();
        }

        $apiCtx = $req->attributes->get(CdaContext::REQUEST_CTX);
        $apiCtx[CdaContext::USER_ID] = $userId;
        $apiCtx[CdaContext::CLIENT_APP_ID] = $clientAppId;
        $apiCtx[CdaContext::CLIENT_RESOURCE_ID] = $clientResourceId;

        $req->attributes->replace([CdaContext::REQUEST_CTX => $apiCtx]);

        return $appKey;
    }
}
