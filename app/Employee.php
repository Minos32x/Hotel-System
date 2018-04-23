<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use Notifiable,Notifiable;

    protected $guard = 'employee';
    

    protected $fillable = [
        'name', 'email', 'password','avatar','national_id','created_by','type'
        ];


        protected $hidden = [
        'password', 'remember_token',
        ];
        

    }
