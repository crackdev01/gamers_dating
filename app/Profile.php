<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

} //end class 
