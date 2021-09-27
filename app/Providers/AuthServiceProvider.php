<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        ClientApplication::class => ClientApplicationPolicy::class,
        ClientApplicationComment::class => ClientApplicationPolicy::class,
        BreakdownItem::class => BreakdownItemPolicy::class,
        BreakdownList::class => BreakdownListPolicy::class,
        User::class => UserPolicy::class,
        AffiliateCampaign::class => AffiliateCampaignPolicy::class,
        ServiceContract::class => ServiceContractPolicy::class,
        SecurityAnalysis::class => SecurityAnalysisPolicy::class,
        Service::class => ServicePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('show-admin', function($user)
        {
            return $user->isAdmin();
        });

        Gate::define('show-dashboard', function($user)
        {
            return $user->getPermission('show-dashboard');
        });

        Gate::define('adminSearch', function($user)
        {
            return $user->isAdmin();
        });

        Gate::define('generate-paymentintent-payment', function($user, $breakdownList)
        {
            return $breakdownList->clientApplication->user_id == $user->id;
        });

        Gate::define('generate-paymentintent-deposit', function($user, $clientApplication)
        {
            return $clientApplication->user_id == $user->id;
        });
    }
}
