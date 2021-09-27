<?php

namespace App\Listeners\BreakdownItems;

use App\BreakdownItem;
use App\Transaction;
use App\Events\BreakdownItems\BreakdownItemPaymentStatusChange;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PaymentStatusChange
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
     * @param  BreakdownItemPaymentStatusChange  $event
     * @return void
     */
    public function handle(BreakdownItemPaymentStatusChange $event)
    {
        $breakdownItems = BreakdownItem::where(['parent_ref_id' => $event->breakdownItem->parent_ref_id])->get();
        $deposits = Transaction::where(['parent_ref_id' => $event->breakdownItem->parent_ref_id, 'transaction_type' => 'deposit'])->get();
        $payments = Transaction::where(['parent_ref_id' => $event->breakdownItem->parent_ref_id, 'transaction_type' => 'payment'])->get();

        if($breakdownItems->count() > 0)
        {
            if($deposits->sum('transaction_amount') >= $breakdownItems->sum('item_deposit') && $breakdownItems->sum('item_balance') > 0)
            {
                $event->breakdownItem->clientApplication->payment_status = 'payment';
            }
            elseif($deposits->sum('transaction_amount') < $breakdownItems->sum('item_deposit') && $breakdownItems->sum('item_balance') > 0)
            {
                $event->breakdownItem->clientApplication->payment_status = 'deposit';
            }
            elseif($breakdownItems->sum('item_balance') == 0 && $breakdownItems->sum('item_deposit') == 0)
            {
                $event->breakdownItem->clientApplication->payment_status = 'nocharge';
            }
                $event->breakdownItem->clientApplication->save();
                
            foreach($breakdownItems as $breakdownItem)
            {
                if($breakdownItem->item_deposit > $breakdownItem->transactions->sum('transaction_amount'))
                {
                    $breakdownItem->payment_status = 'deposit';
                }
                elseif($breakdownItem->item_deposit <= $breakdownItem->transactions->sum('transaction_amount'))
                {
                    $breakdownItem->payment_status = 'payment';
                }
                elseif($breakdownItem->item_balance == 0 && $breakdownItem->item_deposit == 0)
                {
                    $breakdownItem->payment_status = 'nocharge';
                }   
                $breakdownItem->save();
            }
        }
    }
}
