<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoomType;
use App\RoomTypeImage;
use App\Service;
use App\Review;
use Mail;

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
    public function html_email()
    {
        $data = array('name'=>'John Ericsson Robarios');
        Mail::send('mail',$data, function($message){
            $message->to('ercsssn@gmail.com','John Ericsson')->subject('Laravel HTML Testing Mail');
            $message->from('ercsssn@gmail.com','John Ericsson');
            
        });
    }
    
     // Home Page
    function home()
    {
        $services  = Service::all();
        $roomTypes = RoomType::all();
        $reviews = Review::all();

        return View('home',['roomTypes'=>$roomTypes, 'services'=>$services, 'reviews'=>$reviews]);
    }

    // Service Detail Page
    function service_detail(Request $request, $id)
    {
        $service  = Service::find($id);

        return View('servicedetail',['service'=>$service]);
    }

    //Add Reviews
    function add_review()
    {
        return view('addreview');
    }

    // Save Reviews
    function save_review(Request $request)
    {
        $tenantId = session('data')[0]->id;
        $data = new Review;
        $data->tenant_id = $tenantId;
        $data->review = $request->review;
        $data->save();

        return redirect('tenant/add_review')->with('success','Review has been added successfully.');
    }

    

}