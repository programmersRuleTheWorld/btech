<?php

namespace App\Listeners\Repos;

use App\Events\Repos\RepoCreated;
use App\Mail\Repos\Created as MailCreated;
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
     * @param  RepoCreated  $event
     * @return void
     */
    public function handle(RepoCreated $event)
    {
        Mail::to($event->repo->clientApplication->email)->send(new MailCreated($event->repo));
    }
}
