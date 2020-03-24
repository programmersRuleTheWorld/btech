<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceContract extends Model
{
    protected $primaryKey = 'contract_id';

    public function clientapplication()
    {
        return $this->belongsTo('Apps\ClientApplication', 'parent_ref_id', 'ref_id');
    }
}
