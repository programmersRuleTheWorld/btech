<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupportTicketComment extends Model
{
    public function supportTicket()
    {
        return $this->belongsTo('App\SupportTicket');
    }
}
