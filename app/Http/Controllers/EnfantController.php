<?php

namespace App\Http\Controllers;


use App\Models\Enfant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;



class EnfantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function create()
    {
        return view('enfants.create');
    }
  

    public function store(Request $request)
    {
        $request->validate([
        'nom_enfant' => 'required|string|max:45',
        'prenom_Enfant' => 'required|string|max:45',
        'date_Nais' => 'required|date',
    ]);

    $client_id = Auth::guard('client')->id();

    Enfant::create([
        'nom_enfant' => $request->nom_enfant,
        'prenom_Enfant' => $request->prenom_Enfant,
        'date_Nais' => $request->date_Nais,
        'client_id' => $client_id,
    ]);

    return redirect()->route('dashbord.client')->with('success', 'Enfant ajouté avec succès.');
    }


    public function dashboard(Request $request)
    {
      
        
        $client = Auth::guard('client')->user();
        $enfants = Enfant::where('client_id', $client->id)->get();
        Log::info('Enfants:', $enfants->toArray());
         return view('enfants.mesenfants', compact('enfants'));
        
    }
    



    /**
     * Show the form for creating a new resource.
     */
    public function createE()
    {
        return view ("addenfant");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeEnfant(Request $request)
    {
        // Validate the request data
    $request->validate([
        'Nom_enfant' => 'required|string|max:255',
        'Prenom_enfant' => 'required|string|max:255',
        'Date_Naissance' => 'required|date',
        'client_id' => 'required|integer|exists:clients,id'
    ]);
    
    // Create a new Enfant
    $enfant = new Enfant();
    $enfant->Nom_enfant = $request['Nom_enfant'];
    $enfant->Prenom_enfant = $request['Prenom_enfant'];
    $enfant->Date_Naissance = $request['Date_Naissance'];
    $enfant->client_id = $request['client_id'];
    
    $enfant->save();
    
    // Return a JSON response
    return response()->json([
        'message' => 'Enfant créé avec succès.',
        'enfant' => $enfant
    ], 201); // 201 Created
    
    }

    /**
     * Display the specified resource.
     */
    public function show($parent_id)
    {
      

        return view("enfants", compact("parent_id"));
       
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $client_id = Auth::guard('client')->id();

        $request->validate([
            'Nom_enfant' => 'required|string|max:255',
            'Prenom_enfant' => 'required|string|max:255',
            'Date_Naissance' => 'required|date',
        ]);
    
        // Assurez-vous que l'enfant appartient bien au client connecté
        $enfant = Enfant::where('id', $id)->where('client_id', $client_id)->firstOrFail();
        $enfant->Nom_enfant = $request->Nom_enfant;
        $enfant->Prenom_enfant = $request->Prenom_enfant;
        $enfant->Date_Naissance = $request->Date_Naissance;
        $enfant->save();
    
        return redirect()->route('enfants.index')->with('success', 'Informations de l\'enfant mises à jour avec succès.');
    }

    public function edit($id)
    {
        $client_id = Auth::guard('client')->id(); // Assurez-vous que l'ID du client est correctement récupéré
    
        // Récupération de l'enfant avec vérification de la propriété
        $enfant = Enfant::where('id', $id)->where('client_id', $client_id)->firstOrFail();
    
        return view('/enfants/edit', compact('enfant'));
    }




    /**
     * Remove the specified resource from storage.
     */
    public function listenfants(){
        $enfants=Enfant::all();
        return view("listenfants",compact("enfants"));

    }

    public function destroy(Enfant $enfant)
    {
        //
    }
    

    public function newenfant($client_id)
    {
  
    return view('enfants'); 

    }

    public function modifier()
    {
  
    return view('editenfant'); 

    }




  
}
