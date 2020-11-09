<?php

namespace App\Providers;

use User;
use Policies\UserPolicy;
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

        Gate::define('show-development', function($user)
        {
            return $user->isAdmin();
        });

        Gate::define('show-operations', function($user)
        {
            return $user->isAdmin();
        });
    }
}
