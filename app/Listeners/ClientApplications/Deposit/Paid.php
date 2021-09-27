<?php

namespace App\Listeners\ClientApplications\Deposit;

use App\Transaction;
use App\BreakdownItem;
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
        $clientApplication = ClientApplication::find($event->clientApplication);
        $breakdownItems = BreakdownItem::where(['parent_ref_id' => $clientApplication->ref_id, 'payment_status' => 'deposit'])->get();
        session()->forget('clientId');
        
        foreach($breakdownItems as $breakdownItem)
        {
            $deposit = Transaction::where(['parent_item_id' => $breakdownItem->item_id, 'transaction_type' => 'deposit'])->get();
            $transaction = new Transaction();
            $transaction->parent_item_id = $breakdownItem->item_id;
            $transaction->parent_ref_id = $breakdownItem->parent_ref_id;
            $transaction->parent_list_id = $breakdownItem->parent_list_id;
            $transaction->transaction_description = $breakdownItem->item_description;
            $transaction->transaction_type = $clientApplication->payment_status;
            $transaction->transaction_status = 'paid';
            $transaction->transaction_amount = ($breakdownItem->item_deposit - $deposit->sum('transaction_amount'));
            $transaction->save();


            event(new BreakdownItemPaymentStatusChange($breakdownItem));
        }
    }
}
