<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function breakdownItem()
    {
        $this->belongsTo('App\BreakdownItem', 'parent_item_id', 'item_id');
    }

    public function breakdownList()
    {
        $this->belongsTo('App\BreakdownList', 'parent_list_id', 'list_id');
    }

    public function clientApplication()
    {
	$this->belongsTo('App\ClientApplication', 'parent_ref_id', 'ref_id');
    }
}
