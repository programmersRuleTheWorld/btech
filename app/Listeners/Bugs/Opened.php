<?php

namespace App\Listeners\Bugs;

use App\Events\Bugs\BugOpened;
use App\Mail\Bugs\Opened as MailOpened;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Opened
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
     * @param  BugOpened  $event
     * @return void
     */
    public function handle(BugOpened $event)
    {
        $event->bug->repo->clientApplication->bug = true;
        $event->bug->repo->clientApplication->save();

        Mail::to($event->bug->repo->clientApplication->email)->send(new MailOpened($event->bug));
    }
}
