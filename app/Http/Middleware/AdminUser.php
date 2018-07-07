<?php

namespace BCES\Http\Middleware;

use Closure;

class AdminUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->user() || !$request->user()->isAdmin()) {
            if ($request->expectsJson())
                return response()->json(['error' => 'Unauthenticated.'], 401);
            else
                return redirect('/');
        }

        return $next($request);
    }
}
