<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function create()
    {
        return view('subscriptions.create');
    }

    public function store(Request $request)
    {
        $client = auth()->guard('client')->user(); // Assurez-vous que le guard 'client' est correctement configuré si différent du guard par défaut

        $paymentMethod = $request->input('payment_method');

        $client->newSubscription('default', 'plan_id')
            ->create($paymentMethod);

        return redirect()->route('home')->with('success', 'Your subscription has been started.');
    }




}
