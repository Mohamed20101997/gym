<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function scopeWhenSearch($query , $search)
    {
        return $query->when($search , function($q) use ($search){
            return $q->where('first_name' , 'like' , "%$search%")
                    ->orWhere('last_name' , 'like' , "%$search%")
                    ->orWhere('email' , 'like' , "%$search%");
        });

    } //end of scopeWhenSearch
}
