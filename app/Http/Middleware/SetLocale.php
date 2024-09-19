<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;


class SetLocale
{
     /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    public function handle(Request $request, Closure $next)
    
        {
             // Vérifiez si la session contient une locale définie
        if (Session::has('locale')) {
            // Récupérez la locale depuis la session
            $locale = Session::get('locale');
            
            // Définissez la locale de l'application
            App::setLocale($locale);
        }

        return $next($request);
        }
}
