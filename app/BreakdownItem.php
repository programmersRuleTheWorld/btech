<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BreakdownItem extends Model
{
    protected $attributes = [
        'item_status' => false,
        'item_balance' => 0.00
    ];

    protected $fillable = [
        'item_status'
    ];

    protected $primaryKey = 'item_id';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function clientapplication()
    {
        return $this->belongsTo('App\ClientApplication', 'parent_ref_id', 'ref_id');
    }
}
