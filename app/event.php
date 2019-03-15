<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    public function yourEvents() {
        
        return $this->hasMany(personal_event::class);
    }
}
