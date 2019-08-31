<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable=['type','persons'];

    public function hotels(){
        return $this->hasMany(HotelRoom::class);
    }
}
