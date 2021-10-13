<?php

namespace App\Listeners\SupportTickets;

use App\Events\SupportTickets\SupportTicketClosed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ClosedSystemComment
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
     * @param  SupportTicketClosed  $event
     * @return void
     */
    public function handle(SupportTicketClosed $event)
    {
        //
    }
}
