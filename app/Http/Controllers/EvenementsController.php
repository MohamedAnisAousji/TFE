<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
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
        $evenements= Evenement::all(); // Récupère tous les commentaires
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

    $evenement = new Evenement();
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
        // Validation des données
    $validatedData = $request->validate([
        'date_debut'       => 'required|date',
        'date_fin'         => 'required|date|after_or_equal:date_debut',
        'nombre'           => 'required|integer|min:1',
        'status'           => 'required|in:payer,impayer',
        'email'            => 'required|email|max:200',
        'nom_societe'      => 'nullable|string|max:100',
        'formule_demande'  => 'nullable|string',
    ]);

    // Création de l'événement
    $evenement = new Evenement();
    $evenement->date_debut      = $validatedData['date_debut'];
    $evenement->date_fin        = $validatedData['date_fin'];
    $evenement->nombre          = $validatedData['nombre'];
    $evenement->status          = $validatedData['status'];
    $evenement->email           = $validatedData['email'];
    $evenement->nom_societe     = $validatedData['nom_societe'];
    $evenement->formule_demande = $validatedData['formule_demande'];
    $evenement->client_id       = auth()->guard('client')->id();

    $evenement->save();

    return redirect()->route('Event.Confirm')->with('success', 'Événement créé avec succès !');
}



    /**
     * Display the specified resource.
     */
    public function show(Evenement $evenements)
    {
        return view ('/Event/Event');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evenement $evenements)
    {
        //
    }

    public function Confirm(Evenement $evenements)
    {
        return view ('/Event/confirm');

    }

   

    /**
     * Update the specified resource in storage.
     */

    
    public function update(Request $request, Evenement $evenements)
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
    public function destroy(Evenement $evenements)
    {
        //
    }
}
