<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class UserNotificationsMenu extends Component
{
    /**
     * Create a new component instance.
     */
    public  $unreadCount;
    public $notifications;
    public function __construct($count=10)
    {

         $user=Auth::user();
        $this->unreadCount=$user->unreadNotifications()->count();

        $this->notifications=$user->unreadNotifications()
            ->simplePaginate($this->unreadCount);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user-notifications-menu');
    }
}
