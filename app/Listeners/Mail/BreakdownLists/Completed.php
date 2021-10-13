<?php

namespace App\Listeners\Mail\BreakdownLists;

use App\Events\BreakdownItems\BreakdownListCompleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Completed
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
     * @param  BreakdownListCompleted  $event
     * @return void
     */
    public function handle(BreakdownListCompleted $event)
    {
        //
    }
}
