<?php

namespace App\Listeners\ClientApplicationComments;

use App\Events\ClientApplicationComments;
use App\Mail\ClientApplicationComments\Created as MailCreated;
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
     * @param  ClientApplicationComments  $event
     * @return void
     */
    public function handle(ClientApplicationComments $event)
    {
        Mail::to($event->clientApplicationComment->clientApplication->email)->send(new MailCreated($event->clientApplicationComment));
    }
}
