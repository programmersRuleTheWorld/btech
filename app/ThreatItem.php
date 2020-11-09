<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThreatItem extends Model
{

    protected $attributes = ['status' => 'open'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function securityAnalysis()
    {
        return $this->belongsTo('App\SecurityAnalysis');
    }
}
