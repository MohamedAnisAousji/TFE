<?php

namespace App\Http\Controllers;

use App\Models\evenements;
use Illuminate\Http\Request;

class EvenementsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $evenements= Evenements::all(); // Récupère tous les commentaires
        return view('listevenement', compact('evenements'));
        

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Valider les données du formulaire
    $validatedData = $request->validate([
        'date_debut' => 'required|date',
        'date_fin' => 'required|date|after_or_equal:date_debut',
        'capacite' => 'required|integer|min:1',
        'status' => 'required|string|max:200',
        'nom_societe' => 'required|string|max:200',
        'email' => 'required|string|email|max:200',
        'formule_demande' => 'required|string',
    ]);

    $evenement = new Evenements();
        $evenement->date_debut=$request['date_debut'];
        $evenement-> date_fin=$request['date_fin'];
        $evenement->capacite=$request['capacite'];
        $evenement->status=$request['status'];
        $evenement->nom_societe=$request['nom_societe'];
        $evenement->email=$request['email'];
        $evenement ->formule_demande=$request['formule_demande'];

    

     $evenement->save();

    return redirect()->route('evenements.create')->with('success', 'Événement créé avec succès !');


    }

    public function storeClient(Request $request)
{
    // Valider les données du formulaire
    $validatedData = $request->validate([
        'date_debut' => 'required|date',
        'date_fin' => 'required|date|after_or_equal:date_debut',
        'capacite' => 'required|integer|min:1',
        'status' => 'required|string|max:200',
        'nom_societe' => 'required|string|max:200',
        'email' => 'required|string|email|max:200',
        'formule_demande' => 'required|string',
    ]);

    // Création d'un nouvel événement
    $evenement = new Evenements();
    $evenement->date_debut = $request['date_debut'];
    $evenement->date_fin = $request['date_fin'];
    $evenement->capacite = $request['capacite'];
    $evenement->status = $request['status'];
    $evenement->nom_societe = $request['nom_societe'];
    $evenement->email = $request['email'];
    $evenement->formule_demande = $request['formule_demande'];
    
    // Ajouter l'ID du client connecté
    $evenement->client_id = auth()->guard('client')->id();

    // Sauvegarde de l'événement
    $evenement->save();

    // Redirection avec un message de succès
    return redirect()->route('Event.Confirm')->with('success', 'Événement créé avec succès !');
}



    /**
     * Display the specified resource.
     */
    public function show(evenements $evenements)
    {
        return view ('/Event/Event');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(evenements $evenements)
    {
        //
    }

    public function Confirm(evenements $evenements)
    {
        return view ('/Event/confirm');

    }

   

    /**
     * Update the specified resource in storage.
     */

    
    public function update(Request $request, evenements $evenements)
    {
        //
    }

    public function newevenements()
    {
        return view("newevenements" );

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(evenements $evenements)
    {
        //
    }
}
