<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Covid extends Mailable
{
    use Queueable, SerializesModels;

	public $covid;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($covid)
    {
        $this->covid = $covid;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('marketing@bertramtechnologies.com')->markdown('emails.covid.submitted');
    }
}
