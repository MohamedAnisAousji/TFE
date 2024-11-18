<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Affiche la page du tableau de bord.
     */
    public function index()
    {
        // Vous pouvez retourner une vue ou des données ici
        return view('Dashbord'); // Assurez-vous d'avoir une vue 'dashboard.blade.php' dans 'resources/views'
    }
}
