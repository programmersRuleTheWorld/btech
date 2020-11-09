<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class SecurityAnalysis extends Model
{
    public function operation()
    {
        return $this->belongsTo('App\Operation');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function threatItems()
    {
        return $this->hasMany('App\ThreatItem');
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
