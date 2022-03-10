<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public  function category(){
        return $this->belongsTo(Category::class , 'category_id', 'id');
    }
}
