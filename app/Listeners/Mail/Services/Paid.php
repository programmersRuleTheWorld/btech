<?php

namespace App\Listeners\Mail\Services;

use App\Events\Services\ServicePaid;
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
     * @param  ServicePaid  $event
     * @return void
     */
    public function handle(ServicePaid $event)
    {
        //
    }
}
