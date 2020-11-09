<?php

namespace App\Listeners\AffiliateCampaigns;

use App\Events\AffiliateCampaigns\AffiliateCampaignUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Updated
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
     * @param  AffiliateCampaignUpdated  $event
     * @return void
     */
    public function handle(AffiliateCampaignUpdated $event)
    {
        //
    }
}
