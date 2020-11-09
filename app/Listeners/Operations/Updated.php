<?php

namespace App\Listeners\Operations;

use App\Events\Operations\OperationUpdated;
use App\Mail\Operations\Updated as MailUpdated;
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
     * @param  OperationUpdated  $event
     * @return void
     */
    public function handle(OperationUpdated $event)
    {
        Mail::to($event->operation->clientApplication->email)->send(new MailUpdated($event->operation));
    }
}
