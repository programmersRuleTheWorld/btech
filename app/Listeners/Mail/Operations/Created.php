<?php

namespace App\Listeners\Mail\Operations;

use App\Events\Operations\OperationCreated;
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
     * @param  OperationCreated  $event
     * @return void
     */
    public function handle(OperationCreated $event)
    {
        //
    }
}
