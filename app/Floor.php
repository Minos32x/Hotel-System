<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//    $table->increments('id');
// $table->integer('floor_num');
// $table->integer('created_by');
// $table->intger('no_of_room');
// $table->timestamps();

class Floor extends Model
{
    protected $fillable = [
        'floor_num', 'created_by', 'no_of_room',
        ];

}
