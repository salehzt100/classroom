<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{

    public function store(Request $request)
    {

        $request->validate([
            'plan_id' => 'required|int',
            'period' => 'required|int|min:1'
        ]);

        $plan = Plan::findOrFail($request->post('plan_id'));

        $month = $request->post('period');

        Subscription::create([
            'plan_id' => $request->post('plan_id'),
            'user_id' => $request->user()->id,
            'expired_at' => now()->addMonths($month),
            'price' => $month * $plan->price
        ]);

        return redirect()->route('classrooms.index');
    }
}
