<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class user_temp extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','dob','phone','image_path','role_id'
    ];
    use SoftDeletes;
    public function roles()
    {
        return $this->belongsTo('App\role');
    }
}
