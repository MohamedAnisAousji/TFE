<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotClient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$guards='client'): Response
    {
        if (!Auth::guard($guards)->check()) {
			switch ($guards) {
			case 'client':
				$loginRoute = '/client/Login'; // Exemple de route de connexion pour le guard 'geniteur'
				break;
			case 'web':
			default:
				$loginRoute = '/login'; // Route de connexion par défaut
				break;
			}
            // Redirige vers la route de connexion spécifiée.
            return redirect($loginRoute);
		}

        return $next($request);
    }
}
