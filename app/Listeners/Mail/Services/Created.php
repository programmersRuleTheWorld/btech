<?php

namespace App\Listeners\Mail\Services;

use App\Events\Services\ServiceCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Created
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
     * @param  ServiceCreated  $event
     * @return void
     */
    public function handle(ServiceCreated $event)
    {
        //
    }
}
