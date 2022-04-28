<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class PageController extends Controller
{
    // About Us/Contact us Page
    function about_us()
    {
        return view('about_us');
    }

    function faqs()
    {
        return view('faqs');
    }

    function save_msg(Request $request)
    {
        $request->validate([
            'full_name'=>'required',
            'email'=>'required|email',
            'subject'=>'required',
            'msg'=>'required',
        ]);

        $data = array(
            'name'=>$request->full_name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'msg'=>$request->msg,
        );
        Mail::send('mail',$data, function($message){
            $message->to('ercsssn@gmail.com','John Eric')->subject('Laravel HTML Testing Mail');
            $message->from('ercsssn@gmail.com','John Ericsson');
            
        });

        return redirect('about_us')->with('success','Message sent!');

    }
}
