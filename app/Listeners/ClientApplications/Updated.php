<?php

namespace App\Listeners\ClientApplications;

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
        Mail::to($event->clientApplication->email)->send(new MailUpdated($event->clientApplication));
    }
}
