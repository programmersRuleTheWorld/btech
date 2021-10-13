<?php

namespace App\Listeners\Mail\ClientApplications\Deposit;

use App\Events\ClientApplications\ClientApplicationDepositPayable;
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
     * @param  ClientApplicationDepositPayable  $event
     * @return void
     */
    public function handle(ClientApplicationDepositPayable $event)
    {
        //
    }
}
