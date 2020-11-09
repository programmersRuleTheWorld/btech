<?php

namespace App\Listeners\Repos;

use App\Events\Repos\RepoUpdated;
use App\Mail\Repos\Updated as MailUpdated;
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
     * @param  RepoUpdated  $event
     * @return void
     */
    public function handle(RepoUpdated $event)
    {
        Mail::to($event->repo->clientApplication->email)->send(new MailUpdated($event->repo));
    }
}
