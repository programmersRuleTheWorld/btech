<?php

namespace App\Listeners\BreakdownItems;

use App\Events\BreakdownItems\BreakdownItemDepositPaymentStatusChanged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DepositPaymentStatusChanged
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
     * @param  BreakdownItemDepositPaymentStatusChanged  $event
     * @return void
     */
    public function handle(BreakdownItemDepositPaymentStatusChanged $event)
    {
        //
    }
}
