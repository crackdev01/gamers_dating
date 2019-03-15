<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class personal_page extends Model
{
    public function myevents() {
        
        return $this->hasMany(personal_event::class);
    }
}
