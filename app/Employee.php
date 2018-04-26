<?php

namespace App;

use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Employee extends Authenticatable implements BannableContract
{
    use Notifiable, Bannable,HasRoles;

    protected $guard = 'employee';


    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'national_id', 'created_by', 'type','banned_at','banned_by'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


}
