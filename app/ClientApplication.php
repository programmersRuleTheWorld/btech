<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Hash;

class ClientApplication extends Model
{
    protected $primaryKey = 'ref_id';

    public $incrementing = false;
    
    protected $keyType = 'string';

    protected $attributes = [
        'project_status' => 'follow-up',
        'project_balance' => 0.00
    ];
    
    protected $fillable = [
        'name', 'company', 'email', 'phone_number', 'project_type', 'user_id'
    ];

    public function updateAuthCode()
    {
        $this->auth_code = Uuid::uuid4();
        //find way to e-mail pre-hashed value to user
        $this->auth_code = Hash::make($this->auth_code);
        $this->save();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function clientapplicationcomments()
    {
        return $this->hasMany('App\ClientApplicationComment', 'ref_id', 'parent_ref_id');
    }

    public function breakdownitem()
    {
        return $this->hasMany('App\BreakdownItem', 'ref_id', 'parent_ref_id');
    }

    public function servicecontract()
    {
        return $this->hasOne('App\ServiceContract', 'ref_id', 'parent_ref_id');
    }
}
