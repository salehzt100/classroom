<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Services\Stripe\StripePayment;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Stripe\Stripe;
use Stripe\StripeClient;

class PaymentsController extends Controller
{

    public function create(StripePayment $stripe, Subscription $subscription)
    {
        return $stripe->createCheckoutSession( $subscription);
    }


    public function success(Request $request)
    {

return view('payment.success');
    }

    public function cancel()
    {
        return view('payment.cancel');


    }
}
