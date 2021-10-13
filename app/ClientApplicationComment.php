<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ClientApplicationComment extends Model
{
    protected $primaryKey = 'comment_id';

    protected $fillable = [
        'user_id', 'comment_title', 'comment_body'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function clientApplication()
    {
        return $this->belongsTo('App\ClientApplication', 'parent_ref_id', 'ref_id');
    }

    public function getCreatedAt()
    {
        if(isset($this->created_at))
        {
            $carbon = new Carbon();
            return
            $carbon->parse($this->created_at)->englishDayOfWeek 
            . ' ' . $carbon->parse($this->created_at)->englishMonth 
            . ' ' . $carbon->parse($this->created_at)->day; 
        }
    }

}
