<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\formule;
use App\Models\Enfant;
use Illuminate\Http\Request;

class FormuleController extends Controller
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
     * 
     * 
     */

 


    public function createFormule(){

        return view ("/formules/addformule");

    }

    public function getEnfants(Request $request)
    {
        $client_id = auth()->id(); // Récupérer l'ID du client authentifié

        $enfants = Enfant::where('client_id', $client_id)->get();

        return response()->json($enfants);
    }



    public function storeFormule(Request $request)
    {  {
        // Valider les données du formulaire
        //dd($request->all());
        $cleanMontant = preg_replace('/[^\d.]/', '', $request->Montant);  // Enlève tout ce qui n'est pas un chiffre ou un point.
        $request->merge(['Montant' => $cleanMontant]);

        $request->validate([
            'nom_formule' => 'required|string|max:100',
            'desc_formule' => 'required|string|max:200',
            'Montant' => 'required|regex:/^\d+(\.\d{1,2})?$/',// Assurez-vous que la formule est requise
            'enfant_id' => 'required', // Assurez-vous que l'enfant sélectionné est requis
        ]);

        // Créer une nouvelle instance de Formule avec les données validées
        $formule = new Formule();
        $formule->nom_formule = $request->nom_formule; // Assurez-vous que votre modèle Formule a un champ nom_formule
        $formule->desc_formule = $request->desc_formule; // Ajoutez la description si nécessaire
        $formule->Montant = floatval(str_replace('€', '', $request->Montant));
        $formule->client_id = auth()->guard('client')->id(); // Assurez-vous d'avoir l'ID du client connecté

        try {
            $formule->save();
            return redirect()->route('paiements.facture', ['clientId' => $formule->client_id])->with('success', 'Formule enregistrée avec succès.');        } catch (\Exception $e) {
            return back()->withErrors('Erreur lors de la sauvegarde de la formule: ' . $e->getMessage());
    }
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {    {
        $request->validate([
            'nom_formule' => 'required|string|max:100',
            'desc_formule' => 'required|string|max:200',
            'Montant' => 'required|numeric',
        ]);

        $formule = new Formule();
        $formule->nom_formule = $request->nom_formule;
        $formule->desc_formule = $request->desc_formule;
        $formule->Montant = $request->Montant;
        $formule->save();
            
    
            // Redirection ou renvoi d'une réponse après la création
            return redirect()->route('show.formule',)->with('success', 'Formule ajoutée avec succès.');
        }
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $formules=Formule::all();
        return view("formule", compact("formules"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(formule $formule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, formule $formule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id = null )
    {
        $formule = Formule::find($id);
       

        if ($id) {

            $formule->delete(); 
            
            return redirect()->to('/formules')->with('success','supprimer avec succees');  
        
        }else {
            

            return redirect()->to('/formules')->with('error', 'Formule Introuvable');
        
        }


    }

    public function newformules()
    {
       return view ('newformule');
    }


    //function partie client


    public function saveFormule(Request $request)
    {
        // Validation des données
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'nom_formule' => 'required|string|max:100',
            'desc_formule' => 'required|string|max:200',
            'Montant' => 'required|numeric',
        ]);

        // Création de la nouvelle formule
        $formule = new Formule([
            'nom_formule' => $request->nom_formule,
            'desc_formule' => $request->desc_formule,
            'Montant' => $request->Montant,
            'client_id' => $request->client_id,
        ]);

        // Sauvegarde de la formule
        $formule->save();

        return response()->json(['message' => 'Formule sauvegardée avec succès', 'formule' => $formule], 201);


    }
   









}
