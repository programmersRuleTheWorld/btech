<?php

namespace App\Listeners\ClientApplications;

use App\Events\ClientApplications\ClientApplicationCompleted;
use \App\BreakdownList;
use Illuminate\Support\Facades\Log;
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
        $breakdownList = BreakdownList::find($event->clientApplication);
        $clientApplication = $breakdownList->clientApplication;
        if($clientApplication->user->referred_by != null)
        {
            if($clientApplication->transactions->sum('transaction_amount') >= $clientApplication->project_balance)
            {
            $affiliateCampaign = $clientApplication->user->affiliateCampaign;
            $affiliateCampaign->campaign_balance = ($affiliateCampaign->commission_rate * $clientApplication->transactions->sum('transaction_amount'));
            $affiliateCampaign->save();
            }
        }
    }
}
