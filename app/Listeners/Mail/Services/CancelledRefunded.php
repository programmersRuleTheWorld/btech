<?php

namespace App\Listeners\Mail\Services;

use App\Events\Services\ServiceCancelled;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CancelledRefunded
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
     * @param  ServiceCancelled  $event
     * @return void
     */
    public function handle(ServiceCancelled $event)
    {
        //
    }
}
