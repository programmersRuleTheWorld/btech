<?php

namespace App\Listeners\ThreatItems;

use App\Events\ThreatItems\ThreatItemOpened;
use App\Mail\ThreatItems\Opened as MailOpened;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Opened
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
     * @param  ThreatItemOpened  $event
     * @return void
     */
    public function handle(ThreatItemOpened $event)
    {
        $event->threatItem->securityAnalysis->operation->clientApplication->vulnerability = true;
        $event->threatItem->securityAnalysis->operation->clientApplication->save();
    }
}
