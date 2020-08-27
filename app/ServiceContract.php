<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceContract extends Model
{
    protected $casts = [
        'created_at' => 'datetime'
    ];
    
    public function clientApplication()
    {
        return $this->belongsTo('App\ClientApplication', 'parent_ref_id', 'ref_id');
    }
}
