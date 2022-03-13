<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $guarded = [];


    public function scopeWhenSearch($query , $search)
    {
        return $query->when($search , function($q) use ($search){
            return $q->where('name' , 'like' , "%$search%")
                ->orWhere('price' , 'like' , "%$search%");
        });

    } //end of scopeWhenSearch

}
