<?php

namespace App\Jobs;

use App\Models\Subscription;
use App\Notifications\ExpiredSubscriptionNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SentNotificationToExpiredSubscription implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        $this->onQueue('notification');
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $subscriptions=Subscription::whereDate('expired_at','=',now()->addDay(3))->cursor();

        foreach ($subscriptions as $subscription)
        {
            $subscription->user->notify(new ExpiredSubscriptionNotification($subscription));
        }


    }
}
