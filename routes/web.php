<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\EnfantController;
use App\Http\Controllers\EvenementsController;
use App\Http\Controllers\FormuleController;
use App\Http\Controllers\ProfileController;
use App\Models\Reservation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ClientAuthController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\LanguageController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('addLogin');
});




// Route pour changer la langue
Route::post('/set-locale', [LanguageController::class, 'handle'])->name('changeLanguage');


//Les routes pour le choix de langue 
// Route::post('/set-locale', function (Request $request) {
//     $request->validate(['locale' => 'required|in:en,fr']);
//     session(['locale' => $request->locale]);
//     return redirect()->back()->with('status', 'Locale changed to ' . $request->locale);
// })->name('setLocale');









    Route::middleware(['auth:client'])->group(function () {
    Route::get('/Dashbord', [ClientController::class, 'index'])->name('dashbord.client');
    Route::get('/editclient/{id}', [ClientController::class, 'editclient'])->name('editclient.form');
    Route::post('/editclient', [ClientController::class, 'saveclient'])->name('editclient.save');
    Route::get('/enfants/create', [EnfantController::class, 'create'])->name('enfants.create');
    Route::post('/enfants/create', [EnfantController::class, 'store'])->name('enfants.store');
    Route::get('/enfants/mesenfants', [EnfantController::class, 'dashboard'])->name('enfants.mesenfants');
    Route::get('/Client/update', [ClientController::class, 'edit2'])->name('client.edit');
    Route::post('/Client/update', [ClientController::class, 'update2'])->name('client.update');
    
    Route::post('/commentaire/aadcommentaire', [CommentaireController::class, 'store'])->name('commentaire.store');
    Route::get('/commentaire/aadcommentaire', [CommentaireController::class, 'create'])->name('commentaire.create');
   
    Route::post('/formules/addformule', [FormuleController::class, 'storeFormule'])->name('storeF');
    Route::get('/formules/addformule', [FormuleController::class, 'createFormule'])->name('create.formules');
    Route::get('/get-enfants', [FormuleController::class, 'getEnfants'])->name('get-enfants');
    Route::get('/clients/mesformules', [ClientController::class, 'mesformules'])->name('clients.index');
    
    Route::post('/paiement/storepaiement', [PaiementController::class, 'storeFacture'])->name('paiement.store.facture');
    Route::get('/paiement/addpaiement/{clientId}', [PaiementController::class, 'showFacture'])->name('paiements.facture');
    Route::get('/paiement//payment', [PaiementController::class, 'showPaymentForm'])->name('payment.form');
    Route::post('/paiement/payment', [PaiementController::class, 'processPayment'])->name('payment.process');
    Route::post('/payment/webhook', [PaiementController::class, 'handleWebhook'])->name('payment.webhook');
    //on'a ajouter les routes pour cree les abonements
    Route::get('/subscriptions/create', [SubscriptionController::class, 'create'])->name('subscriptions.create');
    Route::post('/subscriptions', [SubscriptionController::class, 'store'])->name('subscriptions.store');
    Route::get('/payment/checkout', [PaiementController::class, 'createSession'])->name('payment.checkout');
    Route::get('/payment/success', function () {
    return view('payment.success');
    })->name('payment.success');
    Route::get('/payment/cancel', function () {
    return view('payment.cancel');
    })->name('payment.cancel');



    
    Route::get('/reservation/create', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/reservation/store', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('/reservation/show', [ReservationController::class, 'showReservations'])->name('reservations.show');
    
    Route::post('/Event/Event', [EvenementsController::class, 'storeClient'])->name('Event.Client');
    Route::get('/Event/Event', [EvenementsController::class, 'show'])->name('Event.show');
    Route::get('/Event/confirm', [EvenementsController::class, 'Confirm'])->name('Event.Confirm');

   


    
    
    











});



    


Route::get('/dashboard', function () {
 return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   

    //Route clients "admin"
    Route::post('/newclients', [ClientController::class, 'store'])->name('storeclients');
    Route::get('/listclients', [ClientController::class, 'show'])->name('listclients');
    Route::get('/newclient', [ClientController::class, 'newclient'])->name('newclient');
    Route::get('/editclient/{id}', [ClientController::class, 'editclient'])->name('editclient.form');
    Route::post('/editclient', [ClientController::class, 'saveclient'])->name('editclient.save');
    Route::get('/deleteclient/{id}', [ClientController::class, 'deleteclient'])->name('deleteclient.deleteClient');
    Route::get('/Email', [ClientController::class, 'Envoiemail'])->name('Envoiemail');
    Route::get('/editclient', [ClientController::class, 'saveclient'])->name('editclient.add');
    //route partie client
    Route::post('/saveclient', [ClientController::class, 'register'])->name('saveclient');
    Route::get('/addclient', [ClientController::class, 'showRegistrationForm'])->name('showRegistrationForm');
    Route::get('/Confirm', [ClientController::class, 'confirm'])->name('Confirm');
    Route::get('/Dashbord', [ClientController::class, 'dashbord'])->name('dashbord.client');
   //client login
    Route::post('/client/Login', [ClientAuthController::class, 'login'])->name('Loginform');
    Route::get('/client/Login', [ClientAuthController::class, 'Displaylogin'])->name('Displaylogin');
    Route::post('/client/logout', [ClientAuthController::class, 'logout'])->name('client.logout');
    

   
   
   
   //--------------------route client part
    Route::get('/addenfant', [EnfantController::class,'createE'])->name('createenfant');
    route::post('/addformule',[FormuleController::class,'saveFormule'])->name('createformule');
    Route::get('/addformule', [FormuleController::class,'createF'])->name('creatformule');
    Route::get('/editenfant', [EnfantController::class,'modifier'])->name('modifier');
    Route::get('/editclient', [ClientController::class, 'edit'])->name('c');

   
    //Route admin enfants
    Route::get('/enfants/{id}', [EnfantController::class,'show'])->name('show');
    Route::post('/enfants', [EnfantController::class,'storeEnfant'])->name('storeEnfant');
    Route::get('/enfants/{client_id}', [EnfantController::class,'newenfant'])->name('newenfant');
    Route::get('/listenfants', [EnfantController::class, 'listenfants'])->name('listenfants');
   //route formules
    Route::get('/formules', [FormuleController::class, 'show'])->name('show.formule');
    Route::get('/deleteformule/{id?}',[FormuleController::class, 'destroy'])->name('deleteformule');
    Route::post('/newformule', [FormuleController::class, 'store'])->name('store.formules');
    Route::get('/newformule', [FormuleController::class, 'newformules'])->name('newformules');
    //route commentaire
    Route::get('/commentaire', [CommentaireController::class, 'create'])->name('show.commentaire');
    Route::get('/listcommentaire', [CommentaireController::class, 'index'])->name('commentaires.index');
    //route d'evenement
    Route::get('/listevenement', [EvenementsController::class, 'create'])->name('evenements.create');
    Route::post('/Event/newevenement', [EvenementsController::class, 'store'])->name('evenements.store');
    Route::get('/Event/newevenements', [EvenementsController::class, 'newevenements'])->name('newevenement');
   








   





    








    





    
 
    
   
   

    
});

require __DIR__.'/auth.php';
