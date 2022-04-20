<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    function roomtypeimgs() 
    {
        return $this->hasMany(RoomTypeImage::class,'room_type_id');
    }
}
