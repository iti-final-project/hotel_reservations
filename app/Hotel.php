<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Hotel extends Authenticatable
{
    protected $fillable=['name','username','email','country','city','district','telephone'];

    protected $hidden = [
        'password', 'remember_token', 'clicks',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function images(){
        return $this->hasMany(Image::class);
    }
    public function rooms(){
        return $this->hasMany(HotelRoom::class);
    }

}
