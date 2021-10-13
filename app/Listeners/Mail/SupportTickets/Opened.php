<?php

namespace App\Listeners\Mail\SupportTickets;

use App\Events\SupportTickets\SupportTicketOpened;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Opened
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
     * @param  SupportTicketOpened  $event
     * @return void
     */
    public function handle(SupportTicketOpened $event)
    {
        //
    }
}
