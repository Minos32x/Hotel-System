<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements BannableContract,JWTSubject
{
    use Notifiable,Bannable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

  
    protected $fillable = [
        'name', 'email', 'password','avatar','phone','gender','country','last_login','banned_by','banned_at','approved_by','approved_state'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
