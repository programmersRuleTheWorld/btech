<?php

namespace App\Mail\SupportTickets;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Closed extends Mailable
{
    use Queueable, SerializesModels;

    public $supportTicket;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($supportTicket)
    {
        $this->supportTicket = $supportTicket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail/supporttickets/closed');
    }
}
