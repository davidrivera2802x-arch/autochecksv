<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PremiumMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle($request, Closure $next)
{
    if (auth()->check() && auth()->user()->is_premium) {
        return $next($request);
    }

    abort(403, 'Necesitas una cuenta premium');
}
}
