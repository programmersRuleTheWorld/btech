<?php

namespace App\Listeners\SecurityAnalyses;

use App\Events\SecurityAnalyses\SecurityAnalysisGenerated;
use App\Mail\SecurityAnalyses\Created as MailGenerated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Generated
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
     * @param  SecurityAnalysisGenerated  $event
     * @return void
     */
    public function handle(SecurityAnalysisGenerated $event)
    {
        Mail::to($event->securityAnalysis->operation->clientApplication->email)->send(new MailCreated($event->securityAnalysis));
    }
}
