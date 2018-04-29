<?php

namespace App;

use App\Employee;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{

    protected $fillable = [
        'number', 'capacity', 'floor_id', 'price', 'created_by', 'is_reserved'
    ];
    
    public function getPriceAttribute($value)
    {
        return ($value/100);
    }

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y') ;
    }
    
    public function getCreatedByAttribute($value)
    {
       return  Employee::find($value)->name;
    }
  
}
