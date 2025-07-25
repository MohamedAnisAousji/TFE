<?php

namespace App\Http\Controllers;

use App\Models\commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupère tous les commentaires
        $commentaires = Commentaire::all(); 
        return view('listcommentaire', compact('commentaires'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("commentaire.addcommentaire");

    }

    /**
     * Store a newly created resource in storage.
     */  public function store(Request $request)
    {
        // Valide les données du formulaire : 
        // 'commentaire' doit être présent et être une chaîne de caractères
        // 'evaluation' doit être un entier entre 1 et 5
        
        $request->validate([
            'commentaire' => 'required|string',
            'evaluation' => 'required|integer|min:1|max:5',
        ]);
        
        // Crée une nouvelle instance du modèle Commentaire
        $commentaire = new Commentaire();
        // Assigne le texte du commentaire depuis la requête
        $commentaire->commentaire = $request->commentaire;
        // Assigne la note d'évaluation depuis la requête
        $commentaire->evaluation = $request->evaluation;
        // Associe le commentaire au client actuellement connecté (via le guard 'client')
        $commentaire->client_id = Auth::guard('client')->id();
        // Enregistre le commentaire dans la base de données
        $commentaire->save();
        // Redirige vers le tableau de bord client avec un message de succès
        return redirect()->route('dashbord.client')->with('success', 'Commentaire ajouté avec succès');
    }


    /**
     * Display the specified resource.
     */
    public function show(commentaire $commentaire)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(commentaire $commentaire)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, commentaire $commentaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(commentaire $commentaire)
    {
        //
    }
}
