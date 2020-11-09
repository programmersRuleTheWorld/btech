<?php

namespace App\Listeners\SecurityAnalyses;

use App\Events\SecurityAnalyses\SecurityAnalysisCreated;
use App\Mail\SecurityAnalyses\Created as MailCreated;
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
     * @param  SecurityAnalysisCreated  $event
     * @return void
     */
    public function handle(SecurityAnalysisCreated $event)
    {
        Mail::to($event->securityAnalysis->operation->clientApplication->email)->send(new MailCreated($event->securityAnalysis));
    }
}
