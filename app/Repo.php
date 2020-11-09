<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repo extends Model
{
    public function clientApplication()
    {
        return $this->belongsTo('App\ClientApplication', 'parent_ref_id', 'ref_id');
    }

    public function bugs()
    {
        return $this->hasMany('App\Bug');
    }
}
