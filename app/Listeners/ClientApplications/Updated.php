<?php

namespace App\Listeners\ClientApplications;

use App\Transaction;
use App\Events\ClientApplications\ClientApplicationUpdated;
use App\Mail\ClientApplications\Updated as MailUpdated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Updated
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
     * @param  ClientApplicationUpdated  $event
     * @return void
     */
    public function handle(ClientApplicationUpdated $event)
    {
        $deposits = Transaction::where(['parent_ref_id' => $event->clientApplication->ref_id, 'transaction_type' => 'deposit'])->get();
        if($event->clientApplication->project_deposit > $deposits->sum('transaction_amount'))
        {
            $event->clientApplication->payment_status = 'deposit';
        }
        elseif($event->clientApplication->project_deposit < $deposits->sum('transaction_amount'))
        {
            $event->clientApplication->payment_status = 'payment';
        }
        elseif($event->clientApplication->project_deposit == 0 && $event->clientApplication->project_balance == 0)
        {
            $event->clientApplication->payment_status = 'nocharge';
        }
            $event->clientApplication->save();

        Mail::to($event->clientApplication->email)->send(new MailUpdated($event->clientApplication));
    }
}
