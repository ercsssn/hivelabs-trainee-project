<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoomType;
use App\RoomTypeImage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // Home Page
    function home()
    {
        $roomTypes=RoomType::all();

        return View('home',['roomTypes'=>$roomTypes]);
    }

}