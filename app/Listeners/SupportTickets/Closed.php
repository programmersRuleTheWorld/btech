<?php

namespace App\Listeners\SupportTickets;

use App\Events\SupportTickets\SupportTicketClosed;
use App\Mail\SupportTickets\Closed as MailClosed;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Closed
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
     * @param  SupportTickets  $event
     * @return void
     */
    public function handle(SupportTicketClosed $event)
    {   
        foreach($event->supportTicket->operation->supportTickets as $supportTicket)
        {
            if($supportTicket->status == 'open')
            {
                return $supportTicket->operation->clientApplication->support = true;
            }
        }
        $supportTicket->operation->clientApplication->support = false;
        $supportTicket->operation->clientApplication->save();

        Mail::to($event->supportTicket->operation->clientApplication->email)->send(new MailClosed($event->supportTicket));
    }
}
