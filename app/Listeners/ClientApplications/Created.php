<?php

namespace App\Listeners\ClientApplications;

use App\Events\ClientApplications\ClientApplicationCreated;
use App\Mail\ClientApplications\Created as MailCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Created
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
     * @param  ClientApplicationCreated  $event
     * @return void
     */
    public function handle(ClientApplicationCreated $event)
    {
        Mail::to($event->clientApplication->email)->send(new MailCreated($event->clientApplication));
    }
}
