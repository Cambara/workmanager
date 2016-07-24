<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'created_at','updated_at', 'fk_user_status', 'fk_user_types'
    ];
    public function type()
    {
        return $this->belongsTo('App\UserType','fk_user_types','id');
    }
    public function status()
    {
        return $this->belongsTo('App\UserStatus','fk_user_status','id');
    }
}
