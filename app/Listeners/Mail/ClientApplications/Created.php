<?php

namespace App\Listeners\Mail\ClientApplications;

use App\Events\ClientApplications\ClientApplicationCreated;
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
     * @param  ClientApplicationCreated  $event
     * @return void
     */
    public function handle(ClientApplicationCreated $event)
    {
        //
    }
}
