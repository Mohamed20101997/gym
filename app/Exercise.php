<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    public $timestamps = false;
    protected $guarded = [];


    public  function follow_up(){
        return $this->belongsTo(FollowUp::class , 'follow_up_id', 'id');
    }
}
