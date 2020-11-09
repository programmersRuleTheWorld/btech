<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BreakdownItem extends Model
{
    protected $attributes = [
        'item_status' => false,
        'balance_paid_status' => false,
        'deposit_paid_status' => false,
        'item_balance' => 0.00,
        'item_deposit' => 0.00,
    ];

    protected $primaryKey = 'item_id';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function breakdownList()
    {
        return $this->belongsTo('App\BreakdownList', 'parent_list_id', 'list_id');
    }

    public function clientApplication()
    {
        return $this->belongsTo('App\ClientApplication', 'parent_ref_id', 'ref_id');
    }
}
