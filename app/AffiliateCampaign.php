<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AffiliateCampaign extends Model
{

    protected $primaryKey = 'affiliate_campaign_id';

    protected $fillable = [
        'affiliate_id', 'referred_user_id',
    ];

    protected $attributes = [
        'commission_rate' => 0.10,
        'campaign_balance' => 0.00,
    ];
    public function affiliate_user()
    {
        return $this->belongsTo('App\User', 'affiliate_id', 'affiliate_id');
    }

    public function referred_user()
    {
        return $this->hasOne('App\User');
    }
}
