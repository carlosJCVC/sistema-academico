<?php

namespace App\Listeners;

use App\Models\UserSessionHistory;
use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class UserLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $evento = 'login';
        $history = new UserSessionHistory();
        $history->user_id = $event->user->id;
        $history->event = $evento;
        $history->ip_address = request()->getClientIp();
        $history->session_id = request()->session()->getId();
        $history->save();
    }
}
