<?php

namespace App\Mail\ClientApplications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Paid extends Mailable
{
    use Queueable, SerializesModels;

    public $paymentIntent;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($paymentIntent)
    {
        $this->paymentIntent = $paymentIntent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.clientapplications.paid');
    }
}
