<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // About Us Page
    function about_us()
    {
        return view('about_us');
    }

    function faqs()
    {
        return view('faqs');
    }
}
