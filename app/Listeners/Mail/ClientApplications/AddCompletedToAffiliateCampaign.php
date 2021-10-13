<?php

namespace App\Listeners\Mail\ClientApplications;

use App\Events\ClientApplications\ClientApplicationCompleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddCompletedToAffiliateCampaign
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
     * @param  ClientApplicationCompleted  $event
     * @return void
     */
    public function handle(ClientApplicationCompleted $event)
    {
        //
    }
}
