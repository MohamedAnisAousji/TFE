<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
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

        // 2. Recherche un admin avec cet email dans la base de données
        $admin = Admin::where('email', $email)->first();

        // Si aucun admin trouvé, retourne une erreur personnalisée
        if (!$admin) {
            return back()->withErrors([
                'email' => 'Cet email ne correspond à aucun compte administrateur.',
            ]);
        }

        // 3. Tente d'authentifier l'admin avec le guard 'admin'
        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            // Régénère la session pour éviter le vol de session
            $request->session()->regenerate();

            // Récupère l'admin connecté
            $admin = Auth::guard('admin')->user();

            // 4. Stocke des données de l'admin en session
            Session::put('admin_id', $admin->id);
            Session::put('admin_email', $admin->email);
            Session::put('auth_guard', 'admin');

            // 5. Redirige vers le tableau de bord admin
            return redirect()->intended('/admin/dashboard');
        }

        // 6. Si l'authentification échoue (mauvais mot de passe)
        return back()->withErrors([
            'password' => 'Le mot de passe est incorrect.',
        ]);
    }

    public function displayLogin()
    {
        return view('adminLogin'); // à adapter selon ta vue
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}