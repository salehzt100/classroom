<?php

namespace App\Http\Controllers;

use App\Actions\CreateSubscription;
use App\Http\Requests\CreateSubscriptionRequest;
use App\Models\Plan;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function store(CreateSubscriptionRequest $request,CreateSubscription $create)
    {

        $plan = Plan::findOrFail($request->post('plan_id'));

        $month = $request->post('period');

        $subscription = $create([
            'plan_id' => $request->post('plan_id'),
            'user_id' => $request->user()->id,
            'expired_at' => now()->addMonths($month),
            'price' => $month * $plan->price,
            'period'=>$month
        ]);

        return redirect()->route('checkout',$subscription->id);


    }
}
