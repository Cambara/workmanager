<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
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
