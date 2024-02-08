<?php

namespace App\Actions;

use App\Models\Payment;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;

class CreatePayment
{

    public function __invoke($checkout_session, Subscription $subscription)
    {
        Payment::create([
            'user_id' => Auth::id(),
            'subscription_id' => $subscription->id,
            'currency_code' => 'usd',
            'status' => 'pending',
            'payment_gateway' => 'stripe',
            'gateway_reference_id' => $checkout_session->id,
            'data' => $checkout_session,
            'amount' => $subscription->price,
        ]);
    }
}
