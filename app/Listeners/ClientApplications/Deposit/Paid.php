<?php

namespace App\Listeners\ClientApplications\Deposit;

use App\Transaction;
use App\BreakdownList;
use App\ClientApplication;
use App\Events\BreakdownItems\BreakdownItemPaymentStatusChange;
use App\Events\ClientApplications\ClientApplicationDepositPaid;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
     * @param  ClientApplicationDepositPaid  $event
     * @return void
     */
    public function handle(ClientApplicationDepositPaid $event)
    {    
        $breakdownListArray = json_decode($event->clientApplication, true);

            $breakdownLists = collect(BreakdownList::find($breakdownListArray['keys']));

            //        session()->forget('clientId');
        
        foreach($breakdownLists as $breakdownList)
        {        
            foreach($breakdownList->breakdownItems as $breakdownItem)
            {
                $deposit = Transaction::where(['parent_item_id' => $breakdownItem->item_id, 'transaction_type' => 'deposit'])->get();
                \Log::debug([
                    $deposit->sum('transaction_amount'),
                    $breakdownItem->item_deposit,
                ]);
                if($breakdownItem->item_deposit > $deposit->sum('transaction_amount'))
                {
                $transaction = new Transaction();
                $transaction->parent_item_id = $breakdownItem->item_id;
                $transaction->parent_ref_id = $breakdownItem->parent_ref_id;
                $transaction->parent_list_id = $breakdownItem->parent_list_id;
                $transaction->transaction_description = $breakdownItem->item_description;
                $transaction->transaction_type = $breakdownItem->clientApplication->payment_status;
                $transaction->transaction_status = 'paid';
                $transaction->transaction_amount = ($breakdownItem->item_deposit - $deposit->sum('transaction_amount'));
                $transaction->save();

                event(new BreakdownItemPaymentStatusChange($breakdownItem));
                }
            }
        }
        session()->forget('paymentIntentId');
    }
}
