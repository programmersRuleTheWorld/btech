<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use App\Events\ClientApplications\AuthCodesReset;
use Carbon\Carbon;
use Models\Mutators\ClientApplicationMutator;
use Illuminate\Support\Facades\Hash;

class ClientApplication extends Model
{
    protected $primaryKey = 'ref_id';

    public $incrementing = false;
    
    protected $keyType = 'string';

    protected $attributes = [
        'project_status' => 'follow-up',
        'project_balance' => 0.00,
        'project_deposit' => 0.00,
        'project_deposit_rate' => 0.20,
        'support' => false,
        'vulnerability' => false,
        'bug' => false,
        'payment_status' => 'nocharge',
    ];

    protected $casts = ['due_date' => 'date:m-d-Y'];
    
    protected $fillable = [
        'name', 'company', 'email', 'phone_number', 'project_type', 'user_id'
    ];

    public function updateAuthCode()
    {
        $this->auth_code = Uuid::uuid4();

//        $this->auth_code = Hash::make($this->auth_code);
//        $this->save();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function clientapplicationComments()
    {
        return $this->hasMany('App\ClientApplicationComment', 'parent_ref_id', 'ref_id');
    }

    public function breakdownLists()
    {
        return $this->hasMany('App\BreakdownList', 'parent_ref_id', 'ref_id');
    }

    public function breakdownItems()
    {
        return $this->hasMany('App\BreakdownItem', 'parent_ref_id', 'ref_id');
    }

    public function serviceContracts()
    {
        return $this->hasMany('App\ServiceContract', 'parent_ref_id', 'ref_id');
    }

    public function operations()
    {
        return $this->hasMany('App\Operation', 'parent_ref_id', 'ref_id');
    }

    public function repos()
    {
        return $this->hasMany('App\Repo', 'parent_ref_id', 'ref_id');
    }

    public function transactions()
    {
	    return $this->hasMany('App\Transaction', 'parent_ref_id', 'ref_id');
    }

    public function services()
    {
        return $this->hasMany('App\Service', 'parent_ref_id', 'ref_id');
    }

    //getters

    public function getProjectStatus()
    {
        if(isset($this->project_status))
        {
            return strToUpper($this->project_status);
        }
    }

    public function getDueDate()
    {
        if(isset($this->due_date))
        {
            $carbon = new Carbon();
            return $carbon->parse($this->due_date)->englishDayOfWeek . ' ' . $carbon->parse($this->due_date)->englishMonth . ' ' . $carbon->parse($this->due_date)->day;
        }
    }

    public function getName()
    {
        if(isset($this->last_name))
        {
            return $this->first_name . ' ' . $this->last_name;
        }
        else
        {
            return $this->first_name;
        }
    }

    public function getProjectName()
    {
        if(isset($this->project_name))
        {
            return $this->project_name;
        }
    }

    public function getRefID()
    {
        if(isset($this->ref_id))
        {
            return $this->ref_id;
        }
    }
    
    public function getEmail()
    {
        if(isset($this->email))
        {
            return $this->email;
        }
    }
    
    public function getPhoneNumber()
    {
        if(isset($this->phone_number))
        {
            return $this->phone_number;
        }
        else
        {
            return 'No phone number set';
        }
    }
    
    public function getCompanyName()
    {
        if(isset($this->company_name))
        {
            return $this->company_name;
        }
        else
        {
            return 'No company name set';
        }
    }
        
    public function getProjectType()
    {
        if(isset($this->project_type))
        {
            return $this->project_type;
        }
    }
    
    public function getExistingSite()
    {
        if(isset($this->existing_site))
        {
            return $this->existing_site;
        }
    }

    public function getDomainName()
    {
        if(isset($this->domain_name))
        {
            return $this->domain_name;
        }
    }

    public function getSiteType()
    {
        if(isset($this->site_type))
        {
            return $this->site_type;
        }
    }

    public function getGovContract()
    {
        if(isset($this->gov_contract))
        {
            return $this->gov_contract;
        }
    }

    public function getWhereHosted()
    {
        if(isset($this->where_hosted))
        {
            return $this->where_hosted;
        }
    }

    public function getSiteURL()
    {
        if(isset($this->site_url))
        {
            return $this->site_url;
        }
    }

    public function getBackendType()
    {
        if(isset($this->backend_type))
        {
            return $this->backend_type;
        }
    }
    
    public function getBackendFramework()
    {
        if(isset($this->backend_framework))
        {
            return $this->backend_framework;
        }
    }
    
    public function getFrontendFramework()
    {
        if(isset($this->frontend_framework))
        {
            return $this->frontend_framework;
        }
    }

    public function getBackendFrameworkType()
    {
        if(isset($this->backend_framework_type))
        {
            return $this->backend_framework_type;
        }
    }

    public function getFrontendFrameworkType()
    {
        if(isset($this->frontend_framework_type))
        {
            return $this->frontend_framework_type;
        }
    }

    public function getPlatform()
    {
        if(isset($this->is_platform))
        {
            return $this->is_platform;
        }
    }

    public function getPlatformType()
    {
        if(isset($this->platform_type))
        {
            return $this->platform_type;
        }
    }

    public function getDBType()
    {
        if(isset($this->db_type))
        {
            return $this->db_type;
        }
    }

    public function getTestScope()
    {
        if(isset($this->test_scope))
        {
            return $this->test_scope;
        }
    }

    public function getSecurityIncidents()
    {
        if(isset($this->security_incidents))
        {
            return $this->security_incidents;
        }
    }

    public function getLegacyBackendType()
    {
        if(isset($this->legacy_backend_type))
        {
            return $this->backend_type;
        }
    }

    public function getNewOrExistingApp()
    {
        if(isset($this->new_or_existing_app))
        {
            return $this->new_or_existing_app;
        }
    }

    public function getAppStore()
    {
        if(isset($this->app_store))
        {
            return $this->app_store;
        }
    }

    public function getProjectDescription()
    {
        if(isset($this->project_description))
        {
            return substr($this->project_description, 0, 150) . '...';
        }
        else
        {
            return 'No project description available.';
        }
    }
}
