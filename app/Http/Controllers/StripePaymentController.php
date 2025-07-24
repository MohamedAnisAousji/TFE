<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\PaymentIntent;

class StripePaymentController extends Controller
{
    public function createPaymentIntent(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // 1. Créer le client Stripe avec adresse
        $customer = Customer::create([
            'email' => $request->email,
            'name' => $request->name,
            'address' => [
                'line1' => $request->address_line1,
                'postal_code' => $request->postal_code,
                'city' => $request->city,
                'country' => $request->country, // ISO (ex: 'BE')
            ],
        ]);

        // 2. Créer le PaymentIntent avec taxes automatiques
        $paymentIntent = PaymentIntent::create([
            'amount' => $request->amount, // en centimes, ex: 2500 = 25.00 €
            'currency' => 'eur',
            'customer' => $customer->id,
            'automatic_tax' => ['enabled' => true],
            'description' => 'Paiement Stardust',
            'metadata' => [
                'reservation_id' => $request->reservation_id,
            ],
        ]);

        return response()->json([
            'clientSecret' => $paymentIntent->client_secret,
        ]);
    }
}

