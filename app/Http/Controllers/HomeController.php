<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoomType;
use App\RoomTypeImage;

class HomeController extends Controller
{
    // Home Page
    function home() 
    {
        $roomTypes = RoomType::all();
        return view('home',['roomTypes'=>$roomTypes]);
    }
}
