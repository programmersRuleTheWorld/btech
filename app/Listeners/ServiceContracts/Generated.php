<?php

namespace App\Listeners\ServiceContracts;

use App\Events\ServiceContracts\ServiceContractGenerated;
use App\Mail\ServiceContracts\Generated as MailGenerated;
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
     * @param  ServiceContractGenerated  $event
     * @return void
     */
    public function handle(ServiceContractGenerated $event)
    {
        Mail::to($event->serviceContract->clientApplication->email)->send(new MailGenerated($event->serviceContract));
    }
}
