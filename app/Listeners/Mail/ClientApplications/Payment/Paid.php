<?php

namespace App\Listeners\Mail\ClientApplications\Payment;

use App\Events\ClientApplications\ClientApplicationPaymentPaid;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Paid
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ClientApplicationPaymentPaid  $event
     * @return void
     */
    public function handle(ClientApplicationPaymentPaid $event)
    {
        //
    }
}
