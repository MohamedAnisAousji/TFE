<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Cashier\Subscription as CashierSubscription;


class SubscriptionController extends CashierSubscription
{
    public function create()
    {
        return view('subscriptions.create');
    }

    public function store(Request $request)
    {
        $client = auth()->guard('client')->user(); // Assurez-vous que le guard 'client' est correctement configuré si différent du guard par défaut

        $paymentMethod = $request->input('payment_method');

        $client->newSubscription('default', 'price_1PhrB0GOkT7NMKHoHXClCK1z')
            ->create($paymentMethod);

        return redirect()->route('reservations.create')->with('success', 'Your subscription has been started.');
    }




}
