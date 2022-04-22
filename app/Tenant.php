<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    function rents() 
    {
        return $this->hasMany(Rent::class);
    }
}
