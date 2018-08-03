<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event_member extends Model
{
    //
    protected $fillable=['events_id','member_id'];
    public function event()
    {
        return $this->belongsTo(Event::class,'events_id');
        //Student::class ==== 'App\Models\Student'
    }
    public function member()
    {
        return $this->belongsTo(Users::class,'member_id');
        //Student::class ==== 'App\Models\Student'
    }

}
