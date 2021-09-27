<?php

namespace App\Listeners\ClientApplications;

use \App\BreakdownList;
use App\Events\ClientApplications\ClientApplicationCompleted;
use App\Mail\ClientApplications\Created as MailCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CompleteClientApplication
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
        $incompleteBreakdownList = BreakdownList::where(['parent_ref_id' => $clientApplication->ref_id, 'list_status' => 'incomplete'])->get();
        if($clientApplication->transactions->sum('transaction_amount') >= $clientApplication->project_balance && $incompleteBreakdownList->count() == 0)
        {
            $clientApplication->project_status = 'complete';
            $clientApplication->save();

            Mail::to($event->clientApplication->email)->send(new MailCreated($event->clientApplication));
        }
    }
}
