<?php

namespace App\Listeners\Mail\ServiceContracts;

use App\Events\ServiceContracts\ServiceContractCreated;
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
     * @param  ServiceContractCreated  $event
     * @return void
     */
    public function handle(ServiceContractCreated $event)
    {
        //
    }
}
