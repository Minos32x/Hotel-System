<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Floor extends Model
{
    protected $fillable = [
        'floor_num', 'created_by', 'no_of_room',
    ];

}
