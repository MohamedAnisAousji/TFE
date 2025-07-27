<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LogoutOtherGuards
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $guardToKeep
     * @return mixed
     */
    public function handle($request, Closure $next, $guardToKeep)
    {
        // Liste des guards à vérifier
        $guards = ['admin', 'client', 'web'];

        foreach ($guards as $guard) {
            if ($guard !== $guardToKeep && Auth::guard($guard)->check()) {
                Auth::guard($guard)->logout();
            }
        }

        return $next($request);
    }
}