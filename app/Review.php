<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    function tenant() 
    {
        return $this->belongsTo(Tenant::class, 'tenant_id');
    }
}
