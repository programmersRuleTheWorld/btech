<?php

namespace App\Listeners\SecurityAnalyses;

use App\Events\SecurityAnalyses\SecurityAnalysisPDFCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PDFCreated
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
     * @param  SecurityAnalysisPDFCreated  $event
     * @return void
     */
    public function handle(SecurityAnalysisPDFCreated $event)
    {
        //
    }
}
