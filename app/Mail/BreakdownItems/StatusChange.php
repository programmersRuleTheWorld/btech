<?php

namespace App\Mail\BreakdownItems;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StatusChange extends Mailable
{

    public $breakdownItem;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($breakdownItem)
    {
        $this->breakdownItem = $breakdownItem;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail/breakdownitems/statuschange');
    }
}
