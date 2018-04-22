<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// client_id, num_of_company, room_num,price,receptionist_id
class Reservations extends Model
{
    protected $fillable = [
        'client_id', 'num_company', 'room_id','price','receptionist_id','approved_state'
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

       
}
