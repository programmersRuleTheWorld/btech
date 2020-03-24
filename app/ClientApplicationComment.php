<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientApplicationComment extends Model
{
    protected $primaryKey = 'comment_id';

    protected $fillable = [
        'user_id', 'comment_title', 'comment_body'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function clientapplication()
    {
        return $this->belongsTo('App\ClientApplication', 'parent_ref_id', 'ref_id');
    }

}
