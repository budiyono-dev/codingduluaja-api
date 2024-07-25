<?php

namespace App\Http\Middleware;

use App\Helper\ContextHelper;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class RequestInfoMiddleware
{
    public function handle(Request $req, Closure $next): Response
    {
        ContextHelper::init($req);
        $log = [
            'method' => ContextHelper::getMethod(),
            'path' => ContextHelper::getPath(),
            'ip' => ContextHelper::getIp(),
        ];
        Log::info('[REQUEST INFO] requqest :', $log);

        $res = $next($req);

        $log['status'] = $res->getStatusCode();
        Log::info('[RESPONSE INFO] response : ', $log);

        return $res;
    }
}
