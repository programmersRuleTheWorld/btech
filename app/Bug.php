<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bug extends Model
{

    protected $attributes = ['status' => true];

    public function repo()
    {
        return $this->belongsTo('App\Repo');
    }
}
