<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AffiliateID extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
}
