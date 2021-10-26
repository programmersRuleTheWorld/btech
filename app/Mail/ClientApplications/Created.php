<?php

namespace App\Mail\ClientApplications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Created extends Mailable
{
    use Queueable, SerializesModels;

    public $clientApplication;
    public $auth;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($clientApplication, $auth)
    {
        $this->clientApplication = $clientApplication;
        $this->auth = $auth;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.clientapplications.created');
    }
}
