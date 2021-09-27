<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BreakdownItem extends Model
{
    protected $attributes = [
        'item_status' => false,
        'payment_status' => 'default',
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

    public function transactions()
    {
        return $this->hasMany('App\Transaction', 'parent_item_id', 'item_id');
    }
}
