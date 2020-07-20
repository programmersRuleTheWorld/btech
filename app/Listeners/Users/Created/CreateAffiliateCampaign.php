<?php

namespace App\Listeners\Users\Created;

use App\AffiliateCampaign;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateAffiliateCampaign
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
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {        
        if($event->user->referred_by != NULL)
        {
            return AffiliateCampaign::create([
                'affiliate_id' => $event->user->referred_by,
                'referred_user_id' => $event->user->id,
            ]);
        }
    }
}
