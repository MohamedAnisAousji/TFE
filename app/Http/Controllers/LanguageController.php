<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
        /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request)           
    {
        // Valider la locale reçue
        $request->validate(['locale' => 'required|in:en,fr']);

        // Stocker la locale dans la session
        $locale = $request->locale;
        Session::put('locale', $locale);

        // Définir la locale de l'application
        App::setLocale($locale);

        // Retourner à la page précédente
        return redirect()->back()->with('status', 'La langue a été changée en ' . $locale);
    }
}
