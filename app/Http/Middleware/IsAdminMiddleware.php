<?php

namespace App\Http\Middleware;

use App\Constants\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->user()->role_code === UserRole::admin()->getCode()) {
            abort(403);
        }
        return $next($request);
    }
}
