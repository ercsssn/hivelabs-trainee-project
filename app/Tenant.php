<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Tenant extends Authenticatable
{
    use Notifiable;
    
    function rents() 
    {
        return $this->hasMany(Rent::class);
    }
}
