<?php

namespace App;

use App\Role;
use Laravel\Cashier\Billable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'first_name', 
        'last_name', 
        'company_name', 
        'email', 
        'phone_number', 
        'password', 
        'affiliate_id', 
        'referred_by',
    ];

    protected $attributes = [
        'user_balance' => 0.00,
        'user_spend' => 0.00,
        'user_earnings' => 0.00,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function clientApplications()
    {
        return $this->hasMany('App\ClientApplication');
    }
    
    public function breakdownItems()
    {
        return $this->hasMany('App\BreakdownItem');
    }
    
    public function clientApplicationComments()
    {
        return $this->hasMany('App\ClientApplicationComment');
    }
    
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function affiliateCampaign()
    {
        return $this->belongsTo('App\AffiliateCampaign', 'id', 'referred_user_id');
    }

    public function affiliateCampaigns()
    {
        return $this->hasMany('App\AffiliateCampaign', 'affiliate_id', 'affiliate_id');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_users');
    }

    public function jobs()
    {
        return $this->belongsToMany('App\ClientApplication', 'developer_client_applications', 'dev_id', 'ref_id');
    }

    public function operations()
    {
        return $this->hasMany('App\Operation');
    }

    public function securityAnalyses()
    {
        return $this->hasMany('App\SecurityAnalysis');
    }

    public function threatItems()
    {
        return $this->hasMany('App\ThreatItem');
    }

    public function isAdmin()
    {
        foreach($this->roles as $role)
        {
            if($role->slug === 'admin-user')
            {
                return true;
            }
        }
        return null;
    }

    public function getPermission($slug)
    {
        if($this->roles()->count() > 0)
        {
        foreach($this->roles as $role)
        {
            foreach($role->permissions as $permission)
            {
                if($permission->slug == $slug)
                {
                return true;
                }
            }
        }
        }
    }
    
    // user getters

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

    public function getEmail()
    {
        if(isset($this->email))
        {
            return $this->email;
        }
        else
        {
            return 'No email set';
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
            return 'Phone number not set';
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

}
