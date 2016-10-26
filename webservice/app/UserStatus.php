<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['description'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "user_status";
    protected $hidden = [
        'created_at','updated_at'
    ];
}
