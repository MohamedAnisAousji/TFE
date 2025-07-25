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

     // 1. Valide les champs email et password du formulaire
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    // Récupère l'email validé
    $email = $credentials['email'];

    // 2. Recherche un client avec cet email dans la base de données
    $client = Client::where('email', $email)->first();

    // Si aucun client trouvé, retourne une erreur personnalisée
    if (!$client) {
        return back()->withErrors([
            'email' => 'Cet email ne correspond à aucun compte enregistré.',
        ]);
    }

    // 3. Tente d'authentifier le client avec les identifiants et le guard 'client'
    if (Auth::guard('client')->attempt($credentials, $request->filled('remember'))) {
        // Régénère la session pour éviter le vol de session (sécurité)
        $request->session()->regenerate();

        // Récupère l'utilisateur connecté
        $client = Auth::guard('client')->user();

        // 4. Stocke des données du client en session (utile pour l'accès ou les vues)
        Session::put('client_id', $client->id);
        Session::put('client_email', $client->email);
        Session::put('auth_guard', 'client');

        // 5. Redirige vers le tableau de bord client
        return redirect()->intended('/Dashbord');
    }

    // 6. Si l'authentification échoue (mauvais mot de passe), retourne une erreur
    return back()->withErrors([
        'password' => 'Le mot de passe est incorrect.',
    ]);

    }

    public function Displaylogin(){

        return view('addLogin');

    }

    public function logout(Request $request)
    {
        // Déconnecte l'utilisateur actuellement authentifié via le guard 'client'
        Auth::guard('client')->logout();
        // Invalide la session actuelle pour éviter toute réutilisatio
        $request->session()->invalidate();
        // Régénère le token CSRF pour plus de sécurité après la déconnexion
        $request->session()->regenerateToken();

        // Redirection vers la page d'accueil après la déconnexion
        return redirect('/');
    }
}

