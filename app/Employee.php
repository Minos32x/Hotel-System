<?php

namespace App;

use Cog\Contracts\Ban\BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable implements BannableContract
{
    use Notifiable,Bannable;

    protected $guard = 'employee';
    

    protected $fillable = [
        'name', 'email', 'password','avatar','national_id','created_by','type'
        ];


        protected $hidden = [
        'password', 'remember_token',
        ];
        

    }
