<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    // number,capacity,floor,created_by,price,created_at,id,reservation


     protected $fillable = [
        'number', 'capacity', 'floor_id','price','created_by','is_reserved'
        ];
}
