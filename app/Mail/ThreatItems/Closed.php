<?php

namespace App\Mail\ThreatItems;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Closed extends Mailable
{
    use Queueable, SerializesModels;

    public $threatItem;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($threatItem)
    {
        $this->threatItem = $threatItem;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail/threatitems/closed');
    }
}
