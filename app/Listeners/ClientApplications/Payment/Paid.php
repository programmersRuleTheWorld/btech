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
        $breakdownListArray = json_decode($event->clientApplication, true);

            $breakdownLists = collect(BreakdownList::find($breakdownListArray['keys']));

            //        session()->forget('clientId');
        
        foreach($breakdownLists as $breakdownList)
        {        
            foreach($breakdownList->breakdownItems as $breakdownItem)
            {
                $payment = Transaction::where(['parent_item_id' => $breakdownItem->item_id, 'transaction_type' => 'payment'])->get();
                if($breakdownItem->item_balance > $payment->sum('transaction_amount'))
                {
                $transaction = new Transaction();
                $transaction->parent_item_id = $breakdownItem->item_id;
                $transaction->parent_ref_id = $breakdownItem->parent_ref_id;
                $transaction->parent_list_id = $breakdownItem->parent_list_id;
                $transaction->transaction_description = $breakdownItem->item_description;
                $transaction->transaction_type = $breakdownItem->clientApplication->payment_status;
                $transaction->transaction_status = 'paid';
                $transaction->transaction_amount = ($breakdownItem->item_balance - $payment->sum('transaction_amount'));
                $transaction->save();

                event(new BreakdownItemPaymentStatusChange($breakdownItem));
                }
            }
        }
        session()->forget('paymentIntentId');
    }
}
