<?php

namespace App\Mail;

use App\CovidForm;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MsgRecvd extends Mailable
{
    use Queueable, SerializesModels;

    public $covidform;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(CovidForm $covidform)
    {
        $this->covidform = $covidform;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('marketing.relations@bertramtechnologies.com')->subject('1099 Marketing Opportunity')
        ->markdown('emails.covid.submitted');
    }
}
