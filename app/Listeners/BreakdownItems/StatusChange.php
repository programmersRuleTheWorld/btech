<?php

namespace App\Listeners\BreakdownItems;

use App\Events\BreakdownItems\BreakdownItemStatusChange;
use App\BreakdownItem;
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
        $breakdownItems = BreakdownItem::where('parent_list_id', $event->breakdownItem->parent_list_id)->get();
        if($breakdownItems->containsStrict('item_status', 0) == true)
        {
            $event->breakdownItem->breakdownList->list_status = 0;
            $event->breakdownItem->breakdownList->save();
        }
        elseif($breakdownItems->containsStrict('item_status', 0) == false)
        {
            $event->breakdownItem->breakdownList->list_status = 1;
            $event->breakdownItem->breakdownList->save();
            
        }
        return;
    }
}

