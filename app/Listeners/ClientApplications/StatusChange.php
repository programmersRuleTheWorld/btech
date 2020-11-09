<?php

namespace App\Listeners\ClientApplications;

use App\Events\ClientApplications\ClientApplicationStatusChange;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StatusChange
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
     * @param  ClientApplicationStatusChange  $event
     * @return void
     */
    public function handle(ClientApplicationStatusChange $event)
    {
        //
    }
}
