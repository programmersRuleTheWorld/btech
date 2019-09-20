<?php

namespace App;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;

class ClientApplication extends Model
{
    public function user(){
    return $this->belongsTo('App\User');
    }

    public function note(){
        return $this->hasMany('App\Note');
    }

    public function updateAuthCode(){
        $this->auth_code = Uuid::uuid4();
        $this->save();
    }

    protected $attributes = [
        'status' => 'follow-up'
    ];

    protected $fillable = [
        'name'
    ];

    protected $primaryKey = 'ref_id';

    public $incrementing = false;

    protected $keyType = 'string';

}
