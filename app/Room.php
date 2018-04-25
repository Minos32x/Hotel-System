<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{

    protected $fillable = [
        'number', 'capacity', 'floor_id', 'price', 'created_by', 'is_reserved'
    ];
}
