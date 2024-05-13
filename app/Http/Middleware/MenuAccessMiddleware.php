<?php

namespace App\Http\Middleware;

use App\Services\MenuService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MenuAccessMiddleware
{
    public function __construct(protected MenuService $menuService)
    {
    }

    public function handle(Request $request, Closure $next): Response
    {
        $isEligible = $this->menuService->isUserEligible($request);
        if (!$isEligible) {
            abort(403);
        }
        return $next($request);
    }
}
