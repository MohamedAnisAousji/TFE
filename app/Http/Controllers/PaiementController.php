<?php

namespace App\Http\Controllers;

use App\Models\paiement;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Formule;
use Stripe\Webhook;
use Stripe\Exception\SignatureVerificationException;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

class PaiementController extends Controller
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
        //
    }

    public function handleWebhook(Request $request)
{
    $payload = $request->getContent();
    $sig_header = $request->header('Stripe-Signature');
    $secret = env('STRIPE_WEBHOOK_SECRET');

    try {
        $event = Webhook::constructEvent(
            $payload, $sig_header, $secret
        );

        // Handle the event ( payment succeeded, subscription created)
        switch ($event->type) {
            case 'payment_intent.succeeded':
                $paymentIntent = $event->data->object; // Contains the payment intent data
                // Handle successful payment here
                break;
            case 'payment_method.attached':
                $paymentMethod = $event->data->object; // Contains the payment method data
                // Handle the new payment method here
                break;
            // Add more event types here
        }

        return response()->json(['status' => 'success'], 200);
    } catch (SignatureVerificationException $e) {
        return response()->json(['error' => 'Invalid signature'], 400);
    } catch (\UnexpectedValueException $e) {
        return response()->json(['error' => 'Invalid payload'], 400);
    }
}

    /**
     * Store a newly created resource in storage.
     */
    public function storeFacture(Request $request)

    {
        $cleanMontant = preg_replace('/[^\d.]/', '', $request->Montant);  // Enlève tout ce qui n'est pas un chiffre ou un point.
        $request->merge(['Montant' => $cleanMontant]);

        $request->validate([
            'montant_paiement' => 'required|numeric',
            'date_paiementr' => 'required|date',
            'paiement_type' => 'required|string',
        ]);
    
        // Création d'une nouvelle instance de paiement
        $paiement = new Paiement();
        $paiement->montant_paiement = $request->montant_paiement;
        $paiement->date_paiementr = $request->date_paiementr;
        $paiement->paiement_type = $request->paiement_type; // Assurez-vous d'inclure le champ pour le type de paiement
        $paiement->client_id = auth()->guard('client')->id(); // Obtention de l'ID client à partir du guard spécifique
    
        // Tentative de sauvegarde du paiement avec gestion des erreurs
        try {
            $paiement->save();
            // Vérifie le type de paiement pour rediriger vers la bonne route
            if ($request->paiement_type == 'en_ligne') {
                return redirect()->route('subscriptions.create')->with('success', 'Paiement enregistré avec succès. Préparez-vous à souscrire en ligne.');
            } else {
                return redirect()->route('reservations.create')->with('success', 'Paiement enregistré avec succès. Vous pouvez continuer à réserver sur place.');
            }
        } catch (\Exception $e) {
            \Log::error("Erreur lors de la sauvegarde du paiement: " . $e->getMessage());
            return back()->withErrors('Erreur lors de la sauvegarde du paiement: ' . $e->getMessage());
        }


    }

    /**
     * Display the specified resource.
     */
    public function showFacture($clientId)
    {
        $client = Client::findOrFail($clientId);
        $formule = Formule::where('client_id', $clientId)->latest()->first(); // Supposant que vous voulez la dernière formule réservée

        return view('paiement.addpaiement', compact('client', 'formule'));
    }




    public function showPaymentForm()
    {
        return view('/paiement/payment');
    }

    public function processPayment(Request $request)
    {
        $user = auth()->user();
        $paymentMethod = $request->input('payment_method');

        $user->newSubscription('main', 'premium_plan')
            ->create($paymentMethod);

        return redirect()->route('home')->with('success', 'Subscription successful!');
    }

    public function createSession()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Product Name',
                    ],
                    'unit_amount' => 2000, // Price in cents
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success'),
            'cancel_url' => route('payment.cancel'),
        ]);

        return redirect($session->url, 303);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(paiement $paiement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, paiement $paiement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(paiement $paiement)
    {
        //
    }
}
