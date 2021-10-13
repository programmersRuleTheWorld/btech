<?php

namespace App\Listeners\Mail\SupportTickets;

use App\Events\SupportTickets\SupportTicketReplied;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Replied
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
     * @param  SupportTicketReplied  $event
     * @return void
     */
    public function handle(SupportTicketReplied $event)
    {
        //
    }
}
