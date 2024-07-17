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

        $credentials = $request->validate([
            'Email' => 'required|email',
            'password' => 'required'
        ]);
    
        $email = $credentials['Email'];
    
        // Vérifiez si l'email existe
        $client = Client::where('Email', $email)->first();
    
        if (!$client) {
            return back()->withErrors([
                'email' => 'Cet email ne correspond à aucun compte enregistré.',
            ]);
        }
    
        // Si l'email existe, essayez l'authentification
        if (Auth::guard('client')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
    
            $client = Auth::guard('client')->user();
            Session::put('client_id', $client->id);
            Session::put('client_email', $client->Email);
            Session::put('auth_guard', 'client');
    
            // Redirection vers l'espace client après une connexion réussie
            return redirect()->intended('/Dashbord');
        }
    
        // Si l'authentification échoue
        return back()->withErrors([
            'password' => 'Le mot de passe est incorrect.',
        ]);




        // {
        //     //dd($request->all());


        //     $credentials = $request->validate([
        //         'Email' => 'required|email',
        //         'password' => 'required'
        //     ]);
    
        //     //$credentials = $request->only('Email', 'password');
    
        //     if (Auth::guard('client')->attempt($credentials, $request->filled('remember'))) {
        //         $request->session()->regenerate();

        //         $client=Auth::guard('client')->user();
        //         Session::put('client_id', $client->id);
        //         Session::put('client_email', $client->Email);
        //         Session::put('auth_guard ','client');


    
        //         // Redirection vers l'espace client après une connexion réussie
        //         return redirect()->intended('/Dashbord');
        //     }
    
        //     return back()->withErrors([
        //         'email' => 'Les informations fournies ne correspondent pas à nos enregistrements.',
        //     ]);
        
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

