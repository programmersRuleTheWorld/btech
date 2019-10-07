<?php

namespace App;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ClientApplication extends Model
{
    use SoftDeletes;

    public function user(){
    return $this->belongsTo('App\User');
    }

    public function clientApplicationComments(){
        return $this->hasMany('App\ClientApplicationComment', 'parent_ref_id', 'ref_id');
    }

    public function updateAuthCode(){
        $this->auth_code = Uuid::uuid4();
        $this->save();
    }

    protected $primaryKey = 'ref_id';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $attributes = [
        'status' => 'follow-up'
    ];

    protected $fillable = [
        'name', 'company', 'email', 'number', 'selection'
    ];

}
