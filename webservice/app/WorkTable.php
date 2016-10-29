<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkTable extends Model
{
    protected $fillable = ['description','day','fk_business','fk_user'];

    protected $hidden = ['fk_business','fk_user'];

    public function user()
    {
        return $this->belongsTo(User::class,'fk_user','id');
    }
    public function business()
    {
        return $this->belongsTo(Business::class,'fk_business','id');
    }
}
