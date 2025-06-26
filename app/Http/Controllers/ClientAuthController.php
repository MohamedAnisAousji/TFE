<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ClientAuthController extends Controller
{
    public function login(Request $request)
    {

 // 1. Validation avec 'email' (minuscule) comme clé
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $email = $credentials['email'];

    // 2. Vérifie si l'email existe dans la base
    $client = Client::where('email', $email)->first();

    if (!$client) {
        return back()->withErrors([
            'email' => 'Cet email ne correspond à aucun compte enregistré.',
        ]);
    }

    // 3. Authentifie le client avec le bon guard
    if (Auth::guard('client')->attempt($credentials, $request->filled('remember'))) {
    
        $request->session()->regenerate();

        $client = Auth::guard('client')->user();

        // 4. Stocke les infos client en session
        Session::put('client_id', $client->id);
        Session::put('client_email', $client->email);
        Session::put('auth_guard', 'client');

        // 5. Redirection vers l'espace client
        return redirect()->intended('/Dashbord');
    }

    // 6. Mot de passe incorrect
    return back()->withErrors([
        'password' => 'Le mot de passe est incorrect.',
    ]);

    }

    public function Displaylogin(){

        return view('addLogin');

    }

    public function logout(Request $request)
    {
        Auth::guard('client')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirection vers la page d'accueil après la déconnexion
        return redirect('/');
    }
}

