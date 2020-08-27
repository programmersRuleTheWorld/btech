<?php

namespace App\Listeners\Users\Created;

use App\AffiliateCampaign;
use App\Events\UserCreated;
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
     * @param  UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        $affiliateCampaign = new AffiliateCampaign();
        $affiliateCampaign->affiliate_id = $event->user->referred_by;
        $affiliateCampaign->referred_user_id = $event->user->id;
        $affiliateCampaign->save();

        dd($event);
    }
}
