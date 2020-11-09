<div class="table-responsive">
<table class="table table-borderless table-sm table-condensed">
    <div class="col-md-6 m-1 ml-auto">
        <div class="text-success text-center bg-dark">
            Project balance: ${{ $clientApplication->project_balance }}
        </div>
    </div>
    <tr>
        <td>
            Reference Identification Number:
        </td>
        <td>
           {{ $clientApplication->getRefID() }}
        </td>
    </tr>
    <tr>
        <td>
            Project Status:
        </td>
            @include('clientapplications.include.clientapplication_status')
    </tr>
    <tr>
        <td>
            Name:
        </td>
        <td>
            {{ $clientApplication->getName() }}
        </td>
    </tr>
    <tr>
        <td>
            Company Name:
        </td>
        <td>
        {{ $clientApplication->getCompanyName() }}
        </td>
    </tr>
    <tr>
        <td>
            Phone Number:
        </td>
        <td>
        {{ $clientApplication->getPhoneNumber() }}
        </td>
    </tr>
    <tr>
        <td>
            Project Type:
        </td>
        <td>
        {{ $clientApplication->getProjectType() }}
        </td>
    </tr>
    <tr>
        <td>
            Project Due Date:
        </td>
        <td>
        {{ $clientApplication->getDueDate() }}
        </td>
    </tr>
    @if(isset($clientApplication->existing_site))
    <tr>
        <td>
            Existing Site;
        </td>
        <td>
        {{ $clientApplication->getExistingSite() }}
        </td>
    </tr>
    @endif
    @if(isset($clientApplication->domain_name))
    <tr>
        <td>
            Domain Name;
        </td>
        <td>
        {{ $clientApplication->getDomainName() }}
        </td>
    </tr>
    @endif
    @if(isset($clientApplication->site_type))
    <tr>
        <td>
            Site Type:
        </td>
        <td>
        {{ $clientApplication->getSiteType() }}
        </td>
    </tr>
    @endif
    @if(isset($clientApplication->gov_contract))
    <tr>
        <td>
            Government Contract:
        </td>
        <td>
        {{ $clientApplication->getGovContract() }}
        </td>
    </tr>
    @endif
    @if(isset($clientApplication->where_hosted))
    <tr>
        <td>
            Hosting Provider:
        </td>
        <td>
        {{ $clientApplication->getWhereHosted() }}
        </td>
    </tr>
    @endif
    @if(isset($clientApplication->site_url))
    <tr>
        <td>
            Current Site URL:
        </td>
        <td>
        {{ $clientApplication->getSiteURL() }}
        </td>
    </tr>
    @endif
    @if(isset($clientApplication->backend_type))
    <tr>
        <td>
            Backend Type:
        </td>
        <td>
        {{ $clientApplication->getBackendType() }}
        </td>
    </tr>
    @endif
    @if(isset($clientApplication->backend_framework))
    <tr>
        <td>
            Backend Framework:
        </td>
        <td>
        {{ $clientApplication->getBackendFramework() }}
        </td>
    </tr>
    @endif
    @if(isset($clientApplication->frontend_framework))
    <tr>
        <td>
            Frontend Framework:
        </td>
        <td>
        {{ $clientApplication->getFrontendFramework() }}
        </td>
    </tr>
    @endif
    @if(isset($clientApplication->backend_framework_type))
    <tr>
        <td>
            Backend Framework Type:
        </td>
        <td>
        {{ $clientApplication->getBackendFrameworkType() }}
        </td>
    </tr>
    @endif
    @if(isset($clientApplication->frontend_framework_type))
    <tr>
        <td>
            Frontend Framework Type:
        </td>
        <td>
        {{ $clientApplication->getFrontendFrameworkType() }}
        </td>
    </tr>
    @endif
    @if(isset($clientApplication->is_platform))
    <tr>
        <td>
            Platform:
        </td>
        <td>
        {{ $clientApplication->getPlatform() }}
        </td>
    </tr>
    @endif
    @if(isset($clientApplication->platform_type))
    <tr>
        <td>
            Platform Type:
        </td>
        <td>
        {{ $clientApplication->getPlatformType() }}
        </td>
    </tr>
    @endif
    @if(isset($clientApplication->get_db_type))
    <tr>
        <td>
            Database Type:
        </td>
        <td>
        {{ $clientApplication->getDBType() }}
        </td>
    </tr>
    @endif
    @if(isset($clientApplication->test_scope))
    <tr>
        <td>
            Test Scope:
        </td>
        <td>
        {{ $clientApplication->getTestScope() }}
        </td>
    </tr>
    @endif
    @if(isset($clientApplication->security_incidents))
    <tr>
        <td>
            Security Incidents:
        </td>
        <td>
        {{ $clientApplication->getSecurityIncidents() }}
        </td>
    </tr>
    @endif
    @if(isset($clientApplication->legacy_backend_type))
    <tr>
        <td>
            Legacy Backend Type:
        </td>
        <td>
        {{ $clientApplication->getLegacyBackendType() }}
        </td>
    </tr>
    @endif
    @if(isset($clientApplication->new_or_existing_app))
    <tr>
        <td>
            New or Existing App:
        </td>
        <td>
        {{ $clientApplication->getNewOrExistingApp() }}
        </td>
    </tr>
    @endif
    @if(isset($clientApplication->app_store))
    <tr>
        <td>
            App Store:
        </td>
        <td>
        {{ $clientApplication->getAppStore() }}
        </td>
    </tr>
    @endif
        </table>
    </div>
    <div class="row ml-2">G
    @if($clientApplication->deposit_payment_status == true)
        <form action="{{ route('client_application_payment', [$clientApplication]) }}" method="POST">
    @else($clientApplication->deposit_payment_status == false)
        <form action="{{ route('client_application_deposit', [$clientApplication]) }}" method="POST">
    @endif
        @csrf
        <a href="/dashboard" class="btn btn-dark text-info m-1">Back</a>
        <a href="/clientapplications/{{$clientApplication->ref_id}}/edit" class="btn btn-dark text-info m-1">Edit</a>
            <input type="hidden" value="{{ $clientApplication }}" name="clientApplication">
    @if($clientApplication->deposit_payment_status == true && $breakdownListDeposits->count() > 0)
            <button class="btn btn-dark text-info" type="submit">Make Payment</button>
    @elseif($clientApplication->deposit_payment_status == false && $breakdownListDeposits->count() > 0)
            <button class="btn btn-dark text-info" type="submit">Make Deposit</button>
    @endif
        </form>
    </div>