<div class="table-responsive">
<table class="table table-borderless table-sm table-condensed">
    <div class="col-md-6 m-1 ml-auto">
        <div class="text-success text-center bg-dark">
            Project balance: ${{ $clientapplication->project_balance }}
        </div>
    </div>
    <tr>
        <td>
            Reference Identification Number:
        </td>
        <td>
           {{ $clientapplication->getRefID() }}
        </td>
    </tr>
    <tr>
        <td>
            Name:
        </td>
        <td>
            {{ $clientapplication->getName() }}
        </td>
    </tr>
    <tr>
        <td>
            Company Name:
        </td>
        <td>
        {{ $clientapplication->getCompanyName() }}
        </td>
    </tr>
    <tr>
        <td>
            Phone Number:
        </td>
        <td>
        {{ $clientapplication->getPhoneNumber() }}
        </td>
    </tr>
    <tr>
        <td>
            Project Type:
        </td>
        <td>
        {{ $clientapplication->getProjectType() }}
        </td>
    </tr>
    @if(isset($clientapplication->existing_site))
    <tr>
        <td>
            Existing Site;
        </td>
        <td>
        {{ $clientapplication->getExistingSite() }}
        </td>
    </tr>
    @endif
    @if(isset($clientapplication->site_type))
    <tr>
        <td>
            Site Type:
        </td>
        <td>
        {{ $clientapplication->getSiteType() }}
        </td>
    </tr>
    @endif
    @if(isset($clientapplication->gov_contract))
    <tr>
        <td>
            Government Contract:
        </td>
        <td>
        {{ $clientapplication->getGovContract() }}
        </td>
    </tr>
    @endif
    @if(isset($clientapplication->where_hosted))
    <tr>
        <td>
            Hosting Provider:
        </td>
        <td>
        {{ $clientapplication->getWhereHosted() }}
        </td>
    </tr>
    @endif
    @if(isset($clientapplication->site_url))
    <tr>
        <td>
            Current Site URL:
        </td>
        <td>
        {{ $clientapplication->getSiteURL() }}
        </td>
    </tr>
    @endif
    @if(isset($clientapplication->backend_type))
    <tr>
        <td>
            Backend Type:
        </td>
        <td>
        {{ $clientapplication->getBackendType() }}
        </td>
    </tr>
    @endif
    @if(isset($clientapplication->backend_framework))
    <tr>
        <td>
            Backend Framework:
        </td>
        <td>
        {{ $clientapplication->getBackendFramework() }}
        </td>
    </tr>
    @endif
    @if(isset($clientapplication->frontend_framework))
    <tr>
        <td>
            Frontend Framework:
        </td>
        <td>
        {{ $clientapplication->getFrontendFramework() }}
        </td>
    </tr>
    @endif
    @if(isset($clientapplication->backend_framework_type))
    <tr>
        <td>
            Backend Framework Type:
        </td>
        <td>
        {{ $clientapplication->getBackendFrameworkType() }}
        </td>
    </tr>
    @endif
    @if(isset($clientapplication->frontend_framework_type))
    <tr>
        <td>
            Frontend Framework Type:
        </td>
        <td>
        {{ $clientapplication->getFrontendFrameworkType() }}
        </td>
    </tr>
    @endif
    @if(isset($clientapplication->is_platform))
    <tr>
        <td>
            Platform:
        </td>
        <td>
        {{ $clientapplication->getPlatform() }}
        </td>
    </tr>
    @endif
    @if(isset($clientapplication->platform_type))
    <tr>
        <td>
            Platform Type:
        </td>
        <td>
        {{ $clientapplication->getPlatformType() }}
        </td>
    </tr>
    @endif
    @if(isset($clientapplication->get_db_type))
    <tr>
        <td>
            Database Type:
        </td>
        <td>
        {{ $clientapplication->getDBType() }}
        </td>
    </tr>
    @endif
    @if(isset($clientapplication->test_scope))
    <tr>
        <td>
            Test Scope:
        </td>
        <td>
        {{ $clientapplication->getTestScope() }}
        </td>
    </tr>
    @endif
    @if(isset($clientapplication->security_incidents))
    <tr>
        <td>
            Security Incidents:
        </td>
        <td>
        {{ $clientapplication->getSecurityIncidents() }}
        </td>
    </tr>
    @endif
    @if(isset($clientapplication->legacy_backend_type))
    <tr>
        <td>
            Legacy Backend Type:
        </td>
        <td>
        {{ $clientapplication->getLegacyBackendType() }}
        </td>
    </tr>
    @endif
    @if(isset($clientapplication->new_or_existing_app))
    <tr>
        <td>
            New or Existing App:
        </td>
        <td>
        {{ $clientapplication->getNewOrExistingApp() }}
        </td>
    </tr>
    @endif
    @if(isset($clientapplication->app_store))
    <tr>
        <td>
            App Store:
        </td>
        <td>
        {{ $clientapplication->getAppStore() }}
        </td>
    </tr>
    @endif
        </table>
    </div>
    <div class="row ml-2">
        <a href="/dashboard" class="btn btn-dark text-info m-1">Back</a>
        <a href="/clientapplications/{{$clientapplication->ref_id}}/edit" class="btn btn-dark text-info m-1">Edit</a>
    </div>