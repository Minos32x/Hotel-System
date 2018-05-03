<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Reservation extends Model
{
    protected $fillable = [
        'client_id', 'num_company', 'room_id', 'price', 'receptionist_id'
    ];

    public function room()
    {
        return $this->hasOne(Room::class);
    }

    public function receptionist()
    {
        return $this->hasOne(Receptionist::class);
    }

    public function client()
    {
        return $this->hasOne(User::class);
    }

    public function getPriceAttribute($value)
    {
        return ($value/100);
    }

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y') ;
    }
    
    public function getReceptionistIDAttribute($value)
    {
       return  Employee::find($value)->name;
    }
  
}
