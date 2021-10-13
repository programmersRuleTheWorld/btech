<?php

namespace App\Listeners\Mail\ClientApplications\Deposit;

use App\Events\ClientApplications\ClientApplicationDepositPaid;
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
     * @param  ClientApplicationDepositPaid  $event
     * @return void
     */
    public function handle(ClientApplicationDepositPaid $event)
    {
        //
    }
}
