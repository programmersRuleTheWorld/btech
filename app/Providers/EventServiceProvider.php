<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */

    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\SecurityAnalyses\SecurityAnalysisCreated' => [
            'App\Listeners\SecurityAnalyses\Created',
            'App\Listeners\Mail\SecurityAnalyses\Created',
        ],
        'App\Events\SecurityAnalyses\SecurityAnalysisPDFCreated' => [
            'App\Listeners\SecurityAnalyses\PDFCreated',
            'App\Listeners\Mail\SecurityAnalyses\PDFCreated',
        ],
        'App\Events\SecurityAnalyses\SecurityAnalysisCompleted' => [
            'App\Listeners\SecurityAnalyses\Completed',
            'App\Listeners\Mail\SecurityAnalyses\Completed',
        ],

        'App\Events\BreakdownItems\BreakdownItemStatusChange' => [
            'App\Listeners\BreakdownItems\StatusChange',
        ],
        'App\Events\BreakdownItems\BreakdownItemPaymentStatusChange' => [
            'App\Listeners\BreakdownItems\PaymentStatusChange',
        ],
        'App\Events\BreakdownItems\BreakdownListCompleted' => [
            'App\Listeners\Mail\BreakdownLists\Completed',
        ],

        'App\Events\Bugs\BugOpened' => [
            'App\Listeners\Bugs\Opened',
        ],
        'App\Events\Bugs\BugClosed' => [
            'App\Listeners\Bugs\Closed',
        ],

        'App\Events\Services\ServiceCreated' => [
            'App\Listeners\Mail\Services\Created',
        ],
        'App\Events\Services\ServicePaid' => [
            'App\Listeners\Mail\Services\Paid',
        ],
        'App\Events\Services\ServiceCancelled' => [
            'App\Listeners\Services\Cancelled',
            'App\Listeners\Services\CancelledSetEndDateToCurrentDay',
            'App\Listeners\Services\CancelledProratedRefund',
            'App\Listeners\Services\CancelledSystemComment',
            'App\Listeners\Mail\Services\CancelledRefunded',
        ],

        'App\Events\Operations\OperationCreated' => [
            'App\Listeners\Mail\Operations\Created',
        ],

        'App\Events\ServiceContracts\ServiceContractCreated' => [
            'App\Listeners\Mail\ServiceContracts\Created',
        ],

        'App\Events\ClientApplications\ClientApplicationCreated' => [
            'App\Listeners\Mail\ClientApplications\Created',
        ],
        'App\Events\ClientApplications\ClientApplicationAuthCodesReset' => [
            'App\Listeners\ClientApplications\AuthCodesReset',
        ],
        'App\Events\ClientApplications\ClientApplicationUpdated' => [
            'App\Listeners\ClientApplications\Updated',
        ],
        'App\Events\ClientApplications\ClientApplicationCompleted' => [
            'App\Listeners\ClientApplications\AddCompletedToAffiliateCampaign',
            'App\Listeners\ClientApplications\CompleteClientApplication',
            'App\Listeners\Mail\ClientApplications\AddCompletedToAffiliateCampaign',
            'App\Listeners\Mail\ClientApplications\CompleteClientApplication',
        ],
        'App\Events\ClientApplications\ClientApplicationPaymentPayable' => [
            'App\Listeners\Mail\ClientApplications\Payment\Payable',
        ],
        'App\Events\ClientApplications\ClientApplicationDepositPayable' => [
            'App\Listeners\Mail\ClientApplications\Deposit\Payable',
        ],
        'App\Events\ClientApplications\ClientApplicationDepositPaid' => [
            'App\Listeners\ClientApplications\Deposit\Paid',
            'App\Listeners\Mail\ClientApplications\Deposit\Paid',
        ],
        'App\Events\ClientApplications\ClientApplicationPaymentPaid' => [
            'App\Listeners\ClientApplications\Payment\Paid',
            'App\Listeners\Mail\ClientApplications\Payment\Paid',
        ],

        'App\Events\SupportTickets\SupportTicketOpened' => [
            'App\Listeners\SupportTickets\Opened',
            'App\Listeners\Mail\SupportTickets\Opened',
        ],
        'App\Events\SupportTickets\SupportTicketClosed' => [
            'App\Listeners\SupportTickets\Closed',
            'App\Listeners\SupportTickets\ClosedSystemComment',
            'App\Listeners\Mail\SupportTickets\Closed',
        ],
        'App\Events\SupportTickets\SupportTicketReplied' => [
            'App\Listeners\Mail\SupportTickets\Replied',
        ],    

        'App\Events\ThreatItems\ThreatItemOpened' => [
            'App\Listeners\ThreatItems\Opened',
        ],
        'App\Events\ThreatItems\ThreatItemClosed' => [
            'App\Listeners\ThreatItems\Closed',
        ],

        'App\Events\UserCreated' => [
            'App\Listeners\Users\Created\AssignClientRole',
            'App\Listeners\Users\Created\CreateAffiliateCampaign',
            'App\Listeners\Users\Created\CreateStripeCustomer',
        ],
    ];

        /**
         * Register any events for your application.
         *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
