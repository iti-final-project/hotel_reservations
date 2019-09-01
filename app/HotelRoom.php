<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelRoom extends Model
{
    protected $fillable=['price','number'];

    public function roomType(){
        return $this->hasOne(Room::class,'id','room_id');
    }

    public function hotel(){
        return $this->hasOne(Hotel::class,'id');
    }

}
