<?php

namespace App\Listeners;

use App\Jobs\SendClassroomNotification;
use App\Models\User;
use App\Notifications\NewClassworkNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendNotificationToAssignedStudent
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
//        foreach ($event->classwork->users as $user)
//        {
//            $user->notify(new NewClassworkNotification($event->classwork));
//        }
//
        $classwork=$event->classwork;
        $job= new SendClassroomNotification(
            $classwork->users,
            new NewClassworkNotification($classwork)
        );

        dispatch($job)->onQueue('notification');
    }
}
