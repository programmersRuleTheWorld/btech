<?php

namespace App\Listeners\Mail\ClientApplications\Payment;

use App\Events\ClientApplications\ClientApplicationPaymentPayable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Payable
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
     * @param  ClientApplicationPaymentPayable  $event
     * @return void
     */
    public function handle(ClientApplicationPaymentPayable $event)
    {
        //
    }
}
