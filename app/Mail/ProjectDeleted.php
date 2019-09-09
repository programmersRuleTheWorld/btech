<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\ClientApplication;

class ProjectDeleted extends Mailable
{
    use Queueable, SerializesModels;

    public $clientapplication;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->clientapplication = $clientapplication;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.clientapplications.deleted');
    }
}
