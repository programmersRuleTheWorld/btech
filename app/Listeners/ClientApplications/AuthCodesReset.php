<?php

namespace App\Listeners\ClientApplications;

use App\Events\ClientApplications\ClientApplicationAuthCodesReset;
use App\Mail\ClientApplications\Created as MailReset;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AuthCodesReset
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
     * @param  ClientApplicationAuthCodesReset  $event
     * @return void
     */
    public function handle(ClientApplicationAuthCodesReset $event)
    {
        Mail::to($event->clientApplication->email)->send(new MailReset($event->clientApplication));
    }
}
