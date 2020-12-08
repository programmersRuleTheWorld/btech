<?php

namespace App\Listeners\BreakdownItems;

use App\Events\BreakdownItems\BreakdownItemCreated;
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
     * @param  BreakdownItemCreated  $event
     * @return void
     */
    public function handle(BreakdownItemCreated $event)
    {
        //
    }
}
