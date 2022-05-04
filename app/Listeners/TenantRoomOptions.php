<?php

namespace App\Listeners;

use App\Events\NewRoomAddition;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TenantRoomOptions
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewRoomAddition  $event
     * @return void
     */
    public function handle(NewRoomAddition $event)
    {
        //
    }
}
