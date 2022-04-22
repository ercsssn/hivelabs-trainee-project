<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    function tenant() 
    {
        return $this->belongsTo(Tenant:class);
    }

    function room() 
    {
        return $this->belongsTo(Room:class);
    }
}
