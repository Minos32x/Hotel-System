<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name', 'email', 'password','avatar','national_id','created_by','type'
        ];
        protected $hidden = [
        'password', 'remember_token',
        ];
}
