<?php

namespace App\Listeners\BreakdownLists;

use App\Events\BreakdownLists\BreakdownListCreated;
use App\Mail\BreakdownLists\Created as MailCreated;
use Illuminate\Support\Facades\Mail;
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
     * @param  BreakdownListCreated  $event
     * @return void
     */
    public function handle(BreakdownListCreated $event)
    {
        Mail::to($event->breakdownList->clientApplication->email)->send(new MailCreated($event->breakdownList));
    }
}
