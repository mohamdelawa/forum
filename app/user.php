<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;

class user extends Authenticatable
{

    use HasApiTokens, Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo('App\role');
    }
    public function hasRole($role)
    {
        if($this->role()->pluck('type')->contains($role)){
            return true;
        }
        return false;
    }

    public function posts()
    {
        return $this->hasMany('App\post');
    }
    public function posts_temp()
    {
        return $this->hasMany('App\post_temp');
    }
    public function comments()
    {
        return $this->hasMany('App\comment');
    }
}
