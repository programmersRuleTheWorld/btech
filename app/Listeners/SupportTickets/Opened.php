<?php

namespace App\Listeners\SupportTickets;

use App\Events\SupportTickets\SupportTicketOpened;
use App\Mail\SupportTickets\Opened as MailOpened;
use Illuminate\Support\Facades\Mail;
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
        $event->supportTicket->operation->clientApplication->support = true;
        $event->supportTicket->operation->clientApplication->save();

        Mail::to($event->supportTicket->operation->clientApplication->email)->send(new MailOpened($event->supportTicket));
    }
}
