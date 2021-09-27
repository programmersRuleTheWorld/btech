<?php

namespace App\Listeners\ClientApplications\Payment;

use App\Events\ClientApplications\ClientApplicationPaymentPaid;
use App\Events\BreakdownItems\BreakdownItemPaymentStatusChange;
use App\BreakdownList;
use App\BreakdownItem;
use App\Transaction;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class Paid
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
     * @param  ClientApplicationPaymentPaid  $event
     * @return void
     */
    public function handle(ClientApplicationPaymentPaid $event)
    {
        $breakdownList = BreakdownList::find($event->clientApplication);
        session()->forget('clientId');

        foreach($breakdownList->breakdownItems as $breakdownItem)
        {
            if(($breakdownItem->item_balance - $breakdownItem->transactions->sum('transaction_amount')) < $breakdownItem->item_balance)
            {
            $transaction = new Transaction();
            $transaction->parent_item_id = $breakdownItem->item_id;
            $transaction->parent_ref_id = $breakdownItem->parent_ref_id;
            $transaction->parent_list_id = $breakdownItem->parent_list_id;
            $transaction->transaction_description = $breakdownItem->item_description;
            $transaction->transaction_type = $breakdownItem->clientApplication->payment_status;
            $transaction->transaction_status = 'paid';
            $transaction->transaction_amount = ($breakdownItem->item_balance - $breakdownItem->transactions->sum('transaction_amount'));
            $transaction->save();
            
            event(new BreakdownItemPaymentStatusChange($breakdownItem));
            }
        }
    }
}
