<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post_temp extends Model
{
    public function user()
    {
        return $this->belongsTo('App\user');
    }
}
