<input type="hidden" id="ref_id" value={{ $clientApplication->ref_id }}>

    <div class="col-md-6 m-1 ml-auto">
        <div class="text-success text-center bg-dark" id="pBalance">
            Project balance: ${{ $clientApplication->project_balance }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            Project Name:
        </div>
        <div class="col-md-6">
           {{ $clientApplication->getProjectName() }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            Reference Identification Number:
        </div>
        <div class="col-md-6">
           {{ $clientApplication->getRefID() }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            Project Status:
        </div>
        <div class="col-md-6">
            @include('clientapplications.include.clientapplication_status')
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            Name:
        </div>
        <div class="col-md-6">
            {{ $clientApplication->getName() }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            Company Name:
        </div>
        <div class="col-md-6">
        {{ $clientApplication->getCompanyName() }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            Phone Number:
        </div>
        <div class="col-md-6">
        {{ $clientApplication->getPhoneNumber() }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            Project Type:
        </div>
        <div class="col-md-6">
        {{ $clientApplication->getProjectType() }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            Project Due Date:
        </div>
        <div class="col-md-6">
        {{ $clientApplication->getDueDate() }}
        </div>
    </div>
    @if(isset($clientApplication->existing_site))
    <div class="row">
        <div class="col-md-6">
            Existing Site;
        </div>
        <div class="col-md-6">
        {{ $clientApplication->getExistingSite() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->domain_name))
    <div class="row">
        <div class="col-md-6">
            Domain Name;
        </div>
        <div class="col-md-6">
        {{ $clientApplication->getDomainName() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->site_type))
    <div class="row">
        <div class="col-md-6">
            Site Type:
        </div>
        <div class="col-md-6">
        {{ $clientApplication->getSiteType() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->gov_contract))
    <div class="row">
        <div class="col-md-6">
            Government Contract:
        </div>
        <div class="col-md-6">
        {{ $clientApplication->getGovContract() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->where_hosted))
    <div class="row">
        <div class="col-md-6">
            Hosting Provider:
        </div>
        <div class="col-md-6">
        {{ $clientApplication->getWhereHosted() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->site_url))
    <div class="row">
        <div class="col-md-6">
            Current Site URL:
        </div>
        <div class="col-md-6">
        {{ $clientApplication->getSiteURL() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->backend_type))
    <div class="row">
        <div class="col-md-6">
            Backend Type:
        </div>
        <div class="col-md-6">
        {{ $clientApplication->getBackendType() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->backend_framework))
    <div class="row">
        <div class="col-md-6">
            Backend Framework:
        </div>
        <div class="col-md-6">
        {{ $clientApplication->getBackendFramework() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->frontend_framework))
    <div class="row">
        <div class="col-md-6">
            Frontend Framework:
        </div>
        <div class="col-md-6">
        {{ $clientApplication->getFrontendFramework() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->backend_framework_type))
    <div class="row">
        <div class="col-md-6">
            Backend Framework Type:
        </div>
        <div class="col-md-6">
        {{ $clientApplication->getBackendFrameworkType() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->frontend_framework_type))
    <div class="row">
        <div class="col-md-6">
            Frontend Framework Type:
        </div>
        <div class="col-md-6">
        {{ $clientApplication->getFrontendFrameworkType() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->is_platform))
    <div class="row">
        <div class="col-md-6">
            Platform:
        </div>
        <div class="col-md-6">
        {{ $clientApplication->getPlatform() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->platform_type))
    <div class="row">
        <div class="col-md-6">
            Platform Type:
        </div>
        <div class="col-md-6">
        {{ $clientApplication->getPlatformType() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->get_db_type))
    <div class="row">
        <div class="col-md-6">
            Database Type:
        </div>
        <div class="col-md-6">
        {{ $clientApplication->getDBType() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->test_scope))
    <div class="row">
        <div class="col-md-6">
            Test Scope:
        </div>
        <div class="col-md-6">
        {{ $clientApplication->getTestScope() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->security_incidents))
    <div class="row">
        <div class="col-md-6">
            Security Incidents:
        </div>
        <div class="col-md-6">
        {{ $clientApplication->getSecurityIncidents() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->legacy_backend_type))
    <div class="row">
        <div class="col-md-6">
            Legacy Backend Type:
        </div>
        <div class="col-md-6">
        {{ $clientApplication->getLegacyBackendType() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->new_or_existing_app))
    <div class="row">
        <div class="col-md-6">
            New or Existing App:
        </div>
        <div class="col-md-6">
        {{ $clientApplication->getNewOrExistingApp() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->app_store))
    <div class="row">
        <div class="col-md-6">
            App Store:
        </div>
        <div class="col-md-6">
        {{ $clientApplication->getAppStore() }}
        </div>
    </div>
    @endif

    <div class="row form-group m-auto">
    @if($clientApplication->payment_status == 'payment' && ($transactions->sum('transaction_amount') < $clientApplication->project_balance))
        <form id="paymentForm" action="{{ route('client_application_payment', [$clientApplication]) }}" method="POST">
    @elseif($clientApplication->payment_status == 'deposit' && ($deposits->sum('transaction_amount') < $clientApplication->project_deposit))
        <form id="paymentForm" action="{{ route('client_application_deposit', [$clientApplication]) }}" method="POST">        
    @elseif($clientApplication->payment_status == 'nocharge')    
    <form id="paymentForm" action="" method="POST">        
    @endif
        @csrf
        <a href="/dashboard" class="btn btn-dark text-info m-1">Back</a>
        <a href="/clientapplications/{{$clientApplication->ref_id}}/edit" class="btn btn-dark text-info m-1">Edit</a>
            <input type="hidden" value="{{ $clientApplication->ref_id }}" name="clientApplication">
    @if($clientApplication->payment_status == 'payment' && ($transactions->sum('transaction_amount') < $clientApplication->project_balance))
            <button class="btn btn-dark text-info" id="caPaymentButton" type="submit">Make Payment</button>

    @elseif($clientApplication->payment_status == 'deposit' && ($deposits->sum('transaction_amount') < $clientApplication->project_deposit))
            <button class="btn btn-dark text-info" id="caPaymentButton" type="submit">Make Deposit</button>
    @else
            <div class="btn btn-dark text-info disabled" id="caPaymentButton">No Charge</div>
    @endif

    @if($clientApplication->services->count() > 0)
            <button class="btn btn-dark text-info" id="caServicesButton" type="submit">Services Payment</button>
    @else
            <button class="btn btn-dark text-info disabled" id="caServicesButton" type="submit">Services Payment</button>            
    @endif
            </form>
        </div>