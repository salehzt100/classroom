<?php

namespace App\Services\Stripe;

use App\Actions\CreatePayment;
use App\Models\Payment;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
use Stripe\StripeClient;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class StripePayment
{
    public function createCheckoutSession(Subscription $subscription): SymfonyResponse
    {
        $stripe = app()->make(StripeClient::class);
        $checkout_session = $stripe->checkout->sessions->create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $subscription->plan->name,
                        'images' => [$subscription->pay_image]
                    ],
                    'unit_amount' => $subscription->plan->price * 100,
                ],
                'quantity' => $subscription->period,
            ]],
            'metadata' => [
                'client_reference_id' => Auth::id(),
            ],
            'mode' => 'payment',
            'success_url' => route('payments.success', $subscription->id),
            'cancel_url' => route('payments.cancel', $subscription->id),
        ]);
// create payment

        $createPayment = new CreatePayment();
        $createPayment($checkout_session, $subscription);

        return redirect()->away($checkout_session->url);
    }

}
