<?php

namespace App\Mail\BreakdownLists;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Completed extends Mailable
{
    use Queueable, SerializesModels;

    public $breakdownList;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($breakdownList)
    {
        $this->breakdownList = $breakdownList;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail/breakdownlists/completed');
    }
}
