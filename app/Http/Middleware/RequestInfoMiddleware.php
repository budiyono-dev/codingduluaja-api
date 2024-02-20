<?php

namespace App\Http\Middleware;

use App\Constants\CdaContext;
use App\Dto\ApiCtx;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class RequestInfoMiddleware
{

    public function handle(Request $req, Closure $next): Response
    {
        $reqId = Str::uuid()->toString();
        $reqInfo = [
            'request_id' => $reqId,
            'method' => $req->method(),
            'path' => $req->path(),
            'ip' => $req->ip()
        ];
        Log::info('[REQUEST INFO] req : '.json_encode($reqInfo));

        $req->attributes->add(
            [
                CdaContext::REQUEST_CTX => [
                    CdaContext::REQUEST_ID => $reqId,
                    CdaContext::PATH => $req->path()
                ]
            ]
        );
        $res = $next($req);

        $reqInfo['status'] = $res->status();

        Log::info('[RESPONSE INFO] req : '.json_encode($reqInfo));

        return $res;
    }
}
