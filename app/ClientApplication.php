<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientApplication extends Model
{
    public function user(){
    return $this->belongsTo('App\User');
    }

    public function note(){
        return $this->hasMany('App\Note');
    }

    protected $primaryKey = 'ref_id';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'user_id',
    ];
}
