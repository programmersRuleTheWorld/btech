<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ClientApplicationComment extends Model
{
    use SoftDeletes;

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function clientApplication(){
        return $this->belongsTo('App\ClientApplication', 'parent_ref_id', 'ref_id');
    }

    protected $fillable = [
        'user_id', 'comment', 'comment_type', 'title'
    ];
    
}
