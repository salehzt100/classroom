<?php

namespace App\Http\Controllers\Webhooks;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\StripeClient;

class StripeController extends Controller
{
    public function __invoke(Request $request, StripeClient $stripe)
    {

// webhook.php
//
// Use this sample code to handle webhook events in your integration.
//
// 1) Paste this code into a new file (webhook.php)
//
// 2) Install dependencies
//   composer require stripe/stripe-php
//
// 3) Run the server on http://localhost:4242
//   php -S localhost:4242

        $endpoint_secret = 'whsec_6978a6a4a246725ad3b35e3a428219fdb2d5bad949c25fccf6fc14599f8d716e';

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sig_header, $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            return response([], 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            return response([], 400);
        }

// Handle the event

        switch ($event->type) {

            case 'checkout.session.completed':
                $session = $event->data->object;
                Payment::where('gateway_reference_id', '=', $session->id)->update([
                    'gateway_reference_id' => $session->payment_intent,
                ]);
                break;
            case 'checkout.session.expired':
                $session = $event->data->object;
                break;
            case 'payment_intent.canceled':

                $paymentIntent = $event->data->object;

                $payment = Payment::where('gateway_reference_id', $paymentIntent->id)->first()->delete();

                 Subscription::where('id', '=', $payment->subscription_id)->delete();

                break;
            case 'payment_intent.created':
                $paymentIntent = $event->data->object;
                break;

//            case 'payment_intent.partially_funded':
//                $paymentIntent = $event->data->object;
//                break;
//            case 'payment_intent.payment_failed':
//                $paymentIntent = $event->data->object;
//                break;
//            case 'payment_intent.processing':
//                $paymentIntent = $event->data->object;
//                break;
//            case 'payment_intent.requires_action':
//                $paymentIntent = $event->data->object;
//                break;
            case 'payment_intent.succeeded':
                $paymentIntent = $event->data->object;

                $payment = Payment::where('gateway_reference_id', $paymentIntent->id)->first();
                $payment->forceFill([
                    'status' => 'completed'
                ])->save();


                $subscription = Subscription::where('id', '=', $payment->subscription_id)->first();
                $subscription->update([
                    'status' => 'active',
                    'expired_at' => now()->addMonths($subscription->period),
                ]);
                break;
            // ... handle other event types
            default:
                echo 'Received unknown event type ' . $event->type;
        }

        return response('', 200);
    }
}
