<?php

namespace App\Listeners\BreakdownItems;

use App\Events\BreakdownItems\BreakdownItemStatusChange;
use App\Mail\BreakdownItems\StatusChange as MailStatusChange;
use App\Mail\BreakdownLists\Completed as MailCompleted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StatusChange
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
     * @param  BreakdownItemStatusChange  $event
     * @return void
     */
    public function handle(BreakdownItemStatusChange $event)
    {
        foreach($event->breakdownItem->breakdownList->breakdownItems as $breakdownItem)
        {
            if($breakdownItem->item_status == false)
            {
                $breakdownItem->breakdownList->list_status = false;
                return $breakdownItem->breakdownList->save();
            }
            else
            {
                $breakdownItem->breakdownList->list_status = true;
                $breakdownItem->breakdownList->save();
            }
        }
        Mail::to($event->breakdownItem->clientApplication->email)->send(new MailStatusChange($event->breakdownItem));
    }
}
