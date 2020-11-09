<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{

    protected $attributes = ['status' => "open"];

    public function operation()
    {
        return $this->belongsTo('App\Operation');
    }

    public function supportTicketComments()
    {
        return $this->hasMany('App\SupportTicketComment');
    }
}
