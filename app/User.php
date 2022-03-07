<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    public $timestamps = false;
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'image',
    ];

    protected $appends  = ['image_path'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);

    }//end of get first name
    public function getLastNameAttribute($value)
    {
        return ucfirst($value);

    } //end of get last name

    public function getImagePathAttribute()
    {
        return asset('uploads/user_images/' . $this->image );

    } //end of get image


}
