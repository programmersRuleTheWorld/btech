<?php

namespace App\Mail\ServiceContracts;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Generated extends Mailable
{
    use Queueable, SerializesModels;

    public $serviceContract;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($serviceContract)
    {
        $this->serviceContract = $serviceContract;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail/servicecontracts/generated');
    }
}
