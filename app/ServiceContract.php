<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ServiceContract extends Model
{
    protected $casts = [
        'created_at' => 'datetime'
    ];
    
    public function clientApplication()
    {
        return $this->belongsTo('App\ClientApplication', 'parent_ref_id', 'ref_id');
    }

    public function getCreatedAt()
    {
        if(isset($this->created_at))
        {
            $carbon = new Carbon();
            return $carbon->parse($this->created_at)->englishDayOfWeek . ' ' . $carbon->parse($this->created_at)->englishMonth . ' ' . $carbon->parse($this->created_at)->day . ' ' . $carbon->parse($this->created_at)->hour . ':' . $carbon->parse($this->created_at)->minute . ':' .$carbon->parse($this->created_at)->second . ' ' . $carbon->parse($this->created_at)->year;
        }
    }
}
