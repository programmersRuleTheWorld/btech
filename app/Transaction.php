<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function breakdownItem()
    {
        return $this->belongsTo('App\BreakdownItem', 'parent_item_id', 'item_id');
    }

    public function breakdownList()
    {
        return $this->belongsTo('App\BreakdownList', 'parent_list_id', 'list_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function clientApplication()
    {
	    return $this->belongsTo('App\ClientApplication', 'parent_ref_id', 'ref_id');
    }
}
