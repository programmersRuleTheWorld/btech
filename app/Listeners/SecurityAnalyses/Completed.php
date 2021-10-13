<?php

namespace App\Listeners\SecurityAnalyses;

use App\Events\SecurityAnalyses\SecurityAnalysisCompleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Completed
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
     * @param  SecurityAnalysisCompleted  $event
     * @return void
     */
    public function handle(SecurityAnalysisCompleted $event)
    {
        //
    }
}
