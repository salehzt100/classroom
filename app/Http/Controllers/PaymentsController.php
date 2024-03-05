<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Subscription;
use App\Services\Stripe\StripePayment;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Stripe\Stripe;
use Stripe\StripeClient;
use function Symfony\Component\String\s;

class PaymentsController extends Controller
{

    public function create(StripePayment $stripe, Subscription $subscription)
    {
        return $stripe->createCheckoutSession($subscription);
    }


    public function success(Request $request)
    {

        return view('payment.success');
    }

    public function cancel(string $id)
    {

        $subscription = Subscription::find($id);

        if ($subscription) {
            Payment::where('subscription_id', $subscription->id)->first()->delete();
            $subscription->delete();

        }


        return redirect()->route('plans');


    }
}
