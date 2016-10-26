<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['description'];

    public function users()
    {
        return $this->hasMany('App\User');
    }
    protected $hidden = [
        'created_at','updated_at'
    ];
}
