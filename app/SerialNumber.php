<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SerialNumber extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    public function scopeWhenSearch($query , $search)
    {
        return $query->when($search , function($q) use ($search){
            return $q->where('serial_number' , 'like' , "%$search%");
        });

    } //end of scopeWhenSearch

    public function getActive(){
        return $this->state == 1 ? 'Reserved' : 'Available' ;
    }

}
