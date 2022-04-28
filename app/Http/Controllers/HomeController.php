<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoomType;
use App\RoomTypeImage;
use App\Service;

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
        $services  = Service::all();
        $roomTypes = RoomType::all();

        return View('home',['roomTypes'=>$roomTypes, 'services'=>$services]);
    }

    // Service Detail Page
    function service_detail(Request $request, $id)
    {
        $service  = Service::find($id);

        return View('servicedetail',['service'=>$service]);
    }

    // Reviews
    function add_review()
    {
        return view('addreview');
    }

    

}