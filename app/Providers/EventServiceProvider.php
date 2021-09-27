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
        'App\Events\UserCreated' => [
            'App\Listeners\Users\Created\AssignClientRole',
            'App\Listeners\Users\Created\CreateAffiliateCampaign',
            'App\Listeners\Users\Created\CreateStripeCustomer',
        ],
        'App\Events\AffiliateCampaigns\AffiliateCampaignUpdated' => [
            'App\Listeners\AffiliateCampaigns\Updated',
        ],
        'App\Events\BreakdownItems\BreakdownItemStatusChange' => [
            'App\Listeners\BreakdownItems\StatusChange',
            ],
        'App\Events\BreakdownItems\BreakdownItemPaymentStatusChange' => [
            'App\Listeners\BreakdownItems\PaymentStatusChange',
        ],
        'App\Events\BreakdownLists\BreakdownListCreated' => [
            'App\Listeners\BreakdownLists\Created',
        ],
        'App\Events\SupportTickets\SupportTicketOpened' => [
            'App\Listeners\SupportTickets\Opened',
            ],
            'App\Events\SupportTickets\SupportTicketClosed' => [
                'App\Listeners\SupportTickets\Closed',
            ],
            'App\Events\ThreatItems\ThreatItemOpened' => [
                'App\Listeners\ThreatItems\Opened',
            ],
            'App\Events\ThreatItems\ThreatItemClosed' => [
                'App\Listeners\ThreatItems\Closed',
            ],
            'App\Events\Bugs\BugOpened' => [
                'App\Listeners\Bugs\Opened',
            ],
            'App\Events\Bugs\BugClosed' => [
                'App\Listeners\Bugs\Closed',
            ],
            'App\Events\ClientApplications\ClientApplicationCreated' => [
                'App\Listeners\ClientApplications\Created',
            ],
            'App\Events\ClientApplications\ClientApplicationAuthCodesReset' => [
                'App\Listeners\ClientApplications\AuthCodesReset',
            ],
            'App\Events\ServiceContracts\ServiceContractGenerated' => [
                'App\Listeners\ServiceContracts\Generated',
            ],
            'App\Events\ClientApplications\ClientApplicationUpdated' => [
                'App\Listeners\ClientApplications\Updated',
            ],
            'App\Events\ClientApplications\ClientApplicationCompleted' => [
                'App\Listeners\ClientApplications\AddCompletedToAffiliateCampaign',
                'App\Listeners\ClientApplications\CompleteClientApplication',
            ],
            'App\Events\ClientApplications\ClientApplicationDepositPaid' => [
                'App\Listeners\ClientApplications\Deposit\Paid',
            ],
            'App\Events\ClientApplications\ClientApplicationPaymentPaid' => [
                'App\Listeners\ClientApplications\Payment\Paid',
            ],
            'App\Events\Operations\OperationUpdated' => [
                'App\Listeners\Operations\Updated',
            ],
            'App\Events\Repos\RepoCreated' => [
                'App\Listeners\Repos\Created',
            ],
            'App\Events\Repos\RepoUpdated' => [
                'App\Listeners\Repos\Updated',
            ],
            'App\Events\SecurityAnalyses\SecurityAnalysisCreated' => [
                'App\Listeners\SecurityAnalyses\Created',
            ],
            'App\Events\SecurityAnalyses\SecurityAnalysisGenerated' => [
                'App\Listeners\SecurityAnalyses\Generated',
            ],
            'App\Events\ClientApplicationComments\ClientApplicationCommentCreated' => [
                'App\Listeners\ClientApplicationComments\Created',
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
