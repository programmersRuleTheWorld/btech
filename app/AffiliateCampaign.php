<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class AffiliateCampaign extends Model
{
    protected $fillable = [
        'affiliate_id', 'referred_user_id',
    ];

    protected $attributes = [
        'commission_rate' => 0.10,
        'campaign_balance' => 0.00,
    ];
    public function affiliateUser()
    {
        return $this->belongsTo('App\User', 'affiliate_id', 'affiliate_id');
    }

    public function referredUser()
    {
        return $this->hasOne('App\User', 'id', 'referred_user_id');
    }

    public function getCreatedAt()
    {
        if(isset($this->created_at))
        {
            $carbon = new Carbon();
            return $carbon->parse($this->created_at)->englishDayOfWeek . ' ' . $carbon->parse($this->created_at)->englishMonth . ' ' . $carbon->parse($this->created_at)->day . ' ' . $carbon->parse($this->created_at)->year;
        }
    }

}
