<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use App\Models\Client;

class SubscriptionController extends Controller
{
    public function create()
    {
        return view('subscriptions.create');
    }

    public function store(Request $request)
    {
        $client = auth()->guard('client')->user(); 
        $paymentMethod = $request->input('payment_method');

        Stripe::setApiKey(config('cashier.secret'));

        $customer = Customer::create([
            'email' => $client->email,
            'name' => $client->prenom_parent . ' ' . $client->nom_parent,
            'address' => [
                'line1' => 'Stardust Park',
                'postal_code' => '1000',
                'city' => 'Bruxelles',
                'country' => 'BE',
            ],
        ]);

        $client->stripe_id = $customer->id;
        $client->save();

        
        $client->newSubscription('default', 'price_1PhrB0GOkT7NMKHoHXClCK1z')
               ->create($paymentMethod);

        return redirect()->route('reservations.create')->with('success', 'Votre abonnement a bien été démarré.');
    }
}
