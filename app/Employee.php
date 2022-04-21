<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    function department() {
        return $this->belongsTo(Department::class);
    }
}
