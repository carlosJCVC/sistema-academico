<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;

class UserEventSubscriber
{
    /**
     * Handle user login events.
     */
    public function onUserLogin(Login $event)
    {
        //
    }

    /**
     * Handle user logout events.
     */
    public function onUserLogout(Logout $event)
    {
        //
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            Login::class,
            'App\Listeners\UserEventSubscriber@onUserLogin'
        );

        $events->listen(
            Logout::class,
            'App\Listeners\UserEventSubscriber@onUserLogout'
        );
    }
}
