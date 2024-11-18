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
        $commentaires = Commentaire::all(); // Récupère tous les commentaires
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
        $request->validate([
            'commentaire' => 'required|string',
            'evaluation' => 'required|integer|min:1|max:5',
        ]);

        $commentaire = new Commentaire();
        $commentaire->commentaire = $request->commentaire;
        $commentaire->evaluation = $request->evaluation;
        $commentaire->client_id = Auth::guard('client')->id();
        $commentaire->save();

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
