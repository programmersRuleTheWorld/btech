<?php

namespace App\Listeners\Bugs;


use App\Events\Bugs\BugClosed;
use App\Mail\Bugs\Closed as MailClosed;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Closed
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
     * @param  BugClosed  $event
     * @return void
     */
    public function handle(BugClosed $event)
    {
        foreach($event->bug->repo->bugs as $bug)
        {
            if($bug->status == 'open')
            {
                return $bug->repo->clientApplication->bug = true;
            }
        }
        $bug->repo->clientApplication->bug = false;
        $bug->repo->clientApplication->save();

        Mail::to($event->bug->repo->clientApplication->email)->send(new MailClosed($event->bug));
    }
}
