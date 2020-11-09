<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{

    protected $fillable = ['domain_host', 'server_host', 'public_ip', 'operation_type', 'server_type', 'domain_name', 'uptime_status', 'payment_status'];

    public function clientApplication()
    {
        return $this->belongsTo('App\ClientApplication', 'parent_ref_id', 'ref_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Users');
    }

    public function supportTickets()
    {
        return $this->hasMany('App\SupportTicket');
    }

    public function securityAnalyses()
    {
        return $this->hasMany('App\SecurityAnalysis');
    }
}
