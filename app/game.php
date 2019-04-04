<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use MarcReichel\IGDBLaravel\Models\Game;

class Game extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
