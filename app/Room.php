<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    function roomType() {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }
}
