<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class BreakdownList extends Model
{
    protected $primaryKey = 'list_id';
 
    protected $attributes = [
        'list_status' => false, 
        'list_balance' => 0.00,
        'list_deposit' => 0.00,
    ];

    protected $fillable = ['list_status'];

    public function clientApplication()
    {
        return $this->belongsTo('App\ClientApplication', 'parent_ref_id', 'ref_id');
    }

    public function breakdownItems()
    {
        return $this->hasMany('App\BreakdownItem', 'parent_list_id', 'list_id');
    }

    public function transactions()
    {
        return $this->hasMany('App\Transaction', 'parent_list_id', 'list_id');
    }

    public function getDueDate()
    {
        if(isset($this->due_date))
        {
            $carbon = new Carbon();
            return $carbon->parse($this->due_date)->englishDayOfWeek . ' ' . $carbon->parse($this->due_date)->englishMonth . ' ' . $carbon->parse($this->due_date)->day;
        }
    }
}
