<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function clientApplication()
    {
        return $this->belongsTo('App\ClientApplication', 'parent_ref_id', 'ref_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'parent_ref_id');
    }

    public function operation()
    {
        return $this->belongsTo('App\Operation', 'parent_ref_id');
    }
}
