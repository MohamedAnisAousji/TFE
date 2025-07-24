<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\Stripe;
use Stripe\Webhook;

class StripeWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $endpoint_secret = env('STRIPE_WEBHOOK_SECRET'); // à configurer !

        $payload = $request->getContent();
        $sig_header = $request->header('Stripe-Signature');

        try {
            $event = Webhook::constructEvent(
                $payload, $sig_header, $endpoint_secret
            );

            if ($event->type === 'payment_intent.succeeded') {
                $paymentIntent = $event->data->object;

                Log::info('Paiement réussi', [
                    'id' => $paymentIntent->id,
                    'amount' => $paymentIntent->amount_received,
                    'tax' => $paymentIntent->automatic_tax['amount'] ?? 0,
                ]);

                // Tu peux ici enregistrer le paiement dans ta base
            }

            return response('Webhook reçu', 200);
        } catch (\Exception $e) {
            return response('Erreur webhook: ' . $e->getMessage(), 400);
        }
    }
}

