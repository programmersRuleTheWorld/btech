<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

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

    public function clientapplications()
    {
        return $this->hasMany('App\ClientApplication');
    }
    
    public function breakdownitems()
    {
        return $this->hasMany('App\BreakdownItem');
    }
    
    public function clientapplicationcomments()
    {
        return $this->hasMany('App\ClientApplicationComment');
    }
    
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function affiliatecampaign()
    {
        return $this->belongsTo('App\AffiliateCampaign', 'id', 'user_id');
    }

    public function affiliatecampaigns()
    {
        return $this->hasMany('App\AffiliateCampaign', 'affiliate_id', 'affiliate_id');
    }
}
