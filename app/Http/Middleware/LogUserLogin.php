<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LogUserLogin
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
        // Vérifier si l'utilisateur est authentifié
        if (Auth::check()) {
            // Récupérer les informations de l'utilisateur
            $user = Auth::user();
            
            // Enregistrer les informations dans le log
            Log::channel('login')->info('Utilisateur connecté : ', [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'login_time' => now()->toDateTimeString(),
                'ip' => $request->ip(),
            ]);
        }

        return $next($request);
    }
}

