<?php

namespace App\Listeners\BreakdownItems;

use App\Events\BreakdownItems\BreakdownItemBalancePaymentStatusChanged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BalancePaymentStatusChanged
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
     * @param  BreakdownItemBalancePaymentStatusChanged  $event
     * @return void
     */
    public function handle(BreakdownItemBalancePaymentStatusChanged $event)
    {
        //
    }
}
