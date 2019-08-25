<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable=['name','username','password','email','country','city','district','telephone'];

}
