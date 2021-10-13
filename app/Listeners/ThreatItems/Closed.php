<?php

namespace App\Listeners\ThreatItems;

use App\Events\ThreatItems\ThreatItemClosed;
use App\Mail\ThreatItems\Closed as MailClosed;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Closed
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
     * @param  ThreatItemClosed  $event
     * @return void
     */
    public function handle(ThreatItemClosed $event)
    {
        foreach($event->threatItem->securityAnalysis->threatItems as $threatItem)
        {
            if($threatItem->status == 'open')
            {
                return $threatItem->securityAnalysis->operation->clientApplication->vulnerability = true;
            }
        }
        $threatItem->securityAnalysis->operation->clientApplication->vulnerability = false;
        $threatItem->securityAnalysis->operation->clientApplication->save();
    }
}
