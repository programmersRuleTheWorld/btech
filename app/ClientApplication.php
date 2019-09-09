<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientApplication extends Model
{
    public function user(){
    return $this->belongsTo('App\User');
    }

    protected $primaryKey = 'ref_id';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'user_id',
    ];
}
