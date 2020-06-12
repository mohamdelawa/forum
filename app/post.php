<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class post extends Model
{
    use SoftDeletes;
    public function user()
    {
        return $this->belongsTo('App\user');
    }
    public function comments()
    {
        return $this->hasMany('App\comment');
    }
}
