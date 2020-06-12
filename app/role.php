<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    public function users()
    {
        return $this->hasMany('App\user');
    }
    public function user_temps()
    {
        return $this->hasMany('App\user_temp');
    }
}
