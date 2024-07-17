<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsClient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Vérifiez si l'utilisateur est authentifié et est un client
        if (!Auth::guard('client')->check()) {
            // Rediriger vers la page de connexion si l'utilisateur n'est pas un client
            return redirect('client/login');
        }

        return $next($request);
    }
}
