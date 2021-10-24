<input type="hidden" id="ref_id" value={{ $clientApplication->ref_id }}>

    <div class="col-sm-6 m-1 ml-auto">
    <div class="text-success text-center bg-dark" id="pBalance">
            Project Balance: ${{ $clientApplication->project_balance }}
        </div>
        <div class="text-warning text-center bg-dark" id="pDeposit">
            Project Deposit: ${{ $clientApplication->project_deposit }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            Project Name:
           {{ $clientApplication->getProjectName() }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            Reference Identification Number:
           {{ $clientApplication->getRefID() }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            Project Status:
            @include('clientapplications.include.clientapplication_status')
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            Name:
            {{ $clientApplication->getName() }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            Company Name:
        {{ $clientApplication->getCompanyName() }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            Phone Number:
        {{ $clientApplication->getPhoneNumber() }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            Project Type:
        {{ $clientApplication->getProjectType() }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            Project Due Date:
        {{ $clientApplication->getDueDate() }}
        </div>
    </div>
    @if(isset($clientApplication->existing_site))
    <div class="row">
        <div class="col-md-6">
            Existing Site;
        {{ $clientApplication->getExistingSite() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->domain_name))
    <div class="row">
        <div class="col-md-6">
            Domain Name;
        {{ $clientApplication->getDomainName() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->site_type))
    <div class="row">
        <div class="col-md-6">
            Site Type:
        {{ $clientApplication->getSiteType() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->gov_contract))
    <div class="row">
        <div class="col-md-6">
            Government Contract:
        {{ $clientApplication->getGovContract() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->where_hosted))
    <div class="row">
        <div class="col-md-6">
            Hosting Provider:
        {{ $clientApplication->getWhereHosted() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->site_url))
    <div class="row">
        <div class="col-md-6">
            Current Site URL:
        {{ $clientApplication->getSiteURL() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->backend_type))
    <div class="row">
        <div class="col-md-6">
            Backend Type:
        {{ $clientApplication->getBackendType() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->backend_framework))
    <div class="row">
        <div class="col-md-6">
            Backend Framework:
        {{ $clientApplication->getBackendFramework() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->frontend_framework))
    <div class="row">
        <div class="col-md-6">
            Frontend Framework:
        {{ $clientApplication->getFrontendFramework() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->backend_framework_type))
    <div class="row">
        <div class="col-md-6">
            Backend Framework Type:
        {{ $clientApplication->getBackendFrameworkType() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->frontend_framework_type))
    <div class="row">
        <div class="col-md-6">
            Frontend Framework Type:
        {{ $clientApplication->getFrontendFrameworkType() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->is_platform))
    <div class="row">
        <div class="col-md-6">
            Platform:
        {{ $clientApplication->getPlatform() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->platform_type))
    <div class="row">
        <div class="col-md-6">
            Platform Type:
        {{ $clientApplication->getPlatformType() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->get_db_type))
    <div class="row">
        <div class="col-md-6">
            Database Type:
        {{ $clientApplication->getDBType() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->test_scope))
    <div class="row">
        <div class="col-md-6">
            Test Scope:
        {{ $clientApplication->getTestScope() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->security_incidents))
    <div class="row">
        <div class="col-md-6">
            Security Incidents:
        {{ $clientApplication->getSecurityIncidents() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->legacy_backend_type))
    <div class="row">
        <div class="col-md-6">
            Legacy Backend Type:
        {{ $clientApplication->getLegacyBackendType() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->new_or_existing_app))
    <div class="row">
        <div class="col-md-6">
            New or Existing App:
        {{ $clientApplication->getNewOrExistingApp() }}
        </div>
    </div>
    @endif
    @if(isset($clientApplication->app_store))
    <div class="row">
        <div class="col-md-6">
            App Store:
        {{ $clientApplication->getAppStore() }}
        </div>
    </div>
    @endif
    
    <input type="hidden" id="depositValue" value="{{ route('client_application_deposit', [$clientApplication]) }}">
    <input type="hidden" id="paymentValue" value="{{ route('client_application_payment', [$clientApplication]) }}">

    <div class="form-group m-auto">
        <div class="row">
            <a href="/dashboard" class="btn btn-dark text-info m-1 col">Back</a>
            <a href="/clientapplications/{{$clientApplication->ref_id}}/edit" class="btn btn-dark text-info m-1 col">Edit</a>
        </div>
        @if($clientApplication->payment_status == 'payment')
        <form id="paymentForm" action="{{ route('client_application_payment', [$clientApplication]) }}" method="POST">
            @elseif($clientApplication->payment_status == 'deposit')
            <form id="paymentForm" action="{{ route('client_application_deposit', [$clientApplication]) }}" method="POST">        
                @elseif($clientApplication->payment_status == 'nocharge')    
                <form id="paymentForm" action="" method="POST">        
                    @endif
                    @csrf
                    <input type="hidden" value="{{ $clientApplication->ref_id }}" name="clientApplication">
                            @if($clientApplication->payment_status == 'payment')
                                    <button class="btn btn-dark text-info col-12" id="caPaymentButton" type="submit">Make Payment</button>

                            @elseif($clientApplication->payment_status == 'deposit')
                                    <button class="btn btn-dark text-info col-12" id="caPaymentButton" type="submit">Make Deposit</button>
                            @else
                                    <button class="btn btn-dark text-info disabled col-12" id="caPaymentButton" type="submit">No Charge</button>
                            @endif    
                    </form>
        </div>

