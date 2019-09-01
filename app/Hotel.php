<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @method static count()
 * @method static select(string $string, string $string1, string $string2, string $string3, string $string4, string $string5, string $string6)
 * @method static where(string $string, string $string1, $query)
 */
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
