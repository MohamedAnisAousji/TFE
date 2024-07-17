<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Enfant;
use Egulias\EmailValidator\Warning\EmailTooLong;
use Illuminate\Http\Request;
use PharIo\Manifest\Email;
use Illuminate\Support\Str;
use App\Models\EmailVerificationToken;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerificationClient;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;






class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     /**
      * creation du premier clients
      */
    

    

        // Faites quelque chose avec les données...
    
      
    public function index()
    {
               // Récupérer l'ID du client connecté
               $clientId = Auth::guard('client')->id();

               // Récupérer les enfants de ce client
               $enfants = Enfant::where('client_id', $clientId)->get();
       
               // Passer les enfants à la vue
               return view('client.dashboard', compact('enfants'));
           }

    

    /**
     * Show the form for creating a new resource.
     */

     public function mesformules()
     {
         // Récupérer tous les clients avec leurs formules
         $clients = Client::with('formules')->get();
 
         return view('/Client/mesformules', compact('clients'));
     }

    
    //fonction client
     public function create(Request $request)
    {
     
         return view("addclient");
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);        
        $validated = $request->validate([
            'Nom_Parent' => 'required',
            'Prenom_Parent' => 'required',
            'Genre'=> 'required',
            'Email'=> 'required|Email',
            'Envoi_Email'=>'required',
            'password' => 'required|min:8',

        ]);

        $clients=new Client();
        $clients->Nom_Parent = $request['Nom_Parent'];
        $clients->Prenom_Parent= $request['Prenom_Parent'];
        $clients->Email= $request['Email'];
        $clients->Genre= $request['Genre'];
        $clients->Envoi_Email= $request['Envoi_Email'];
        $clients->password = bcrypt($request->input('password')); 
        $clients->save();
        return redirect('/listclients')->with('success','cree avec succees');

    }
    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $query=Client::query();
        // Recherche
		if ($request->filled('search')) {
			$search = $request->input('search');
			$query->where('Nom_Parent', 'like', "%{$search}%") // Recherche par nom
				->orWhere('Prenom_Parent', 'like', "%{$search}%"); // Vous pouvez ajouter plus de conditions ici
		}
        $clients = $query->paginate(10);

        return view("clients", compact("clients"));
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    public function rules()
{
    return [
        'Nom_Parent' => 'required',
        // Autres règles de validation...
    ];
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        
    }
    public function listclients(){

        return view("listclients" );

    }
    public function newclient()
    {
        return view("newclient" );

    }

    public function editclient($id)
    {
        $client = Client::find($id);

    if ($client) {
        return response()->json([
            'client' => $client
        ], 200); // 200 OK
    } else {
        return response()->json([
            'error' => 'Client introuvable'
        ], 404); // 404 Not Found
    }

    }

    
    public function saveclient(Request $request)
    {

        $validated = $request->validate([
            'id' => 'required|integer',
            'Nom_Parent' => 'required',
            'Prenom_Parent' => 'required',
            'Genre'=> 'required',
            'Email'=> 'required|Email',
            'Envoi_Email'=>'required',

        ]);
        $clients = Client::find($request->id);
        $clients->Nom_Parent = $request['Nom_Parent'];
        $clients->Prenom_Parent= $request['Prenom_Parent'];
        $clients->Email= $request['Email'];
        $clients->Genre= $request['Genre'];
        $clients->Envoi_Email= $request['Envoi_Email'];


        $clients->save();
        return redirect('/listclients')->with('success','Modifier avec succees');


    }
    public function deleteClient($id)
    {
    $client = Client::find($id);


    if ($client) {
        $client->delete(); 
        return redirect('/listclients')->with('success','supprimer avec succees');  
    }else {
        return redirect()->route('/listclients')->with('error', 'Client introuvable.');
    
    }
    }
    public function Envoiemail()
    {
        return view("Email" );


    }








    //Client Part
    public function register(Request $request)
    {
        // Validez les données du formulaire d'inscription
        $validatedData = $request->validate([
            'Nom_Parent' => 'required',
            'Prenom_Parent' => 'required',
            'Genre' => 'required',
            'Email' => 'required|email|unique:clients', // Assurez-vous que l'e-mail est unique
            'password' => 'required|min:8', // validation pour le mot de passe
            'Envoi_Email' => 'required',
        ]);
    
        // Créez un nouveau client
        $client = new Client();
        $client->Nom_Parent = $request->input('Nom_Parent');
        $client->Prenom_Parent = $request->input('Prenom_Parent');
        $client->Genre = $request->input('Genre');
        $client->Email = $request->input('Email');
        $client->password = bcrypt($request->input('password')); // Cryptez le mot de passe
        $client->Envoi_Email = $request->input('Envoi_Email');
        $client->save();
    
        // Redirigez vers la page de connexion avec un message de succès
        return redirect()->route('Displaylogin')->with('success', 'Client registered successfully. Please log in.');
    }
    

    
  
    public function showRegistrationForm()
    {
        return view('addclient');

    }

    public function confirm()
    {
        return view('Confirm');

    }


    
    public function dashbord()
    {
        return view('/Dashbord');

    }

    public function edit(Client $client)
    {
        return view('/editclient');
    }



    public function edit2()
{
    $client = auth()->user(); // Assurez-vous que vous utilisez un guard adapté si nécessaire
    return view('/Client/update', compact('client'));
}
public function update2(Request $request)
{
    $client = auth()->user();

    $request->validate([
        'Nom_Parent' => 'required|string|max:100',
        'Prenom_Parent' => 'required|string|max:100',
        'Genre' => 'required|boolean',
        'Email' => 'required|string|email|max:100|unique:clients,Email,' . $client->id,
        'Envoi_Email' => 'required|boolean',
        'password' => 'nullable|string|min:8|confirmed', // Confirmer que le mot de passe correspond et est d'au moins 8 caractères
    ]);

    $data = $request->all();
    if (!empty($data['password'])) {
        $data['password'] = bcrypt($data['password']); // Hash du nouveau mot de passe
    } else {
        unset($data['password']); // Ne pas modifier le mot de passe s'il n'est pas fourni
    }

    // Mise à jour des informations
    $client->update($data);

    return redirect()->route('dashbord.client')->with('success', 'Profil mis à jour avec succès.');
}







    



}

    
    








  


    


  
  

 


