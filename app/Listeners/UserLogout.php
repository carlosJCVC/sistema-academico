<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\UserSessionHistory;
use Illuminate\Support\Facades\Log;

class UserLogout
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
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        $evento = 'logout';
        $history = new UserSessionHistory();
        $history->user_id = $event->user->id;
        $history->event = $evento;
        $history->ip_address = request()->getClientIp();
        $history->session_id = request()->session()->getId();
        $history->save();
    }
}
