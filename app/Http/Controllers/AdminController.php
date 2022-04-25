<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Admin;
use App\Rent;
use Cookie;

class AdminController extends Controller
{
    //Login
    function login() 
    {
        return view('login');
    }

    //Check Login
    function check_login(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);

        $admin = Admin::where(['username'=>$request->username, 'password'=>sha1($request->password)])->count();

        if ($admin > 0) {
            $adminData = Admin::where(['username'=>$request->username, 'password'=>sha1($request->password)])->get();
            session(['adminData'=>$adminData]);

            if ($request->has('rememberme')) {
                Cookie::queue('adminuser',$request->username,1440);
                Cookie::queue('adminpwd',$request->password,1440);
            }
            return redirect('admin');
        }else{
            return redirect('admin/login')->with('msg','Invalid Username or Password!');
        }
    }

    //Logout
    function logout() 
    {
        session()->forget(['adminData']);
        return redirect('admin/login');
    }

    function dashboard() 
    {
        $rent = Rent::selectRaw('count(id) as total_rent, check_in_date')->groupBy('check_in_date')->get();

        $labels=[];
        $data=[];
        foreach($rent as $r) {
            $labels[] = $r['check_in_date'];
            $data[] = $r['total_rent'];
        }

        //For Pie Chart
        $rt_rent = DB::table('room_types as rt')
           ->join('rooms as r','r.room_type_id','=','rt.id')
           ->join('rents as re','re.room_id','=','r.id')
           ->select('rt.*','r.*','re.*',DB::raw('count(re.id) as total_rent'))
           ->groupBy('r.room_type_id')
           ->get();

        $plabels=[];
        $pdata=[];
        foreach($rt_rent as $re) {
            $plabels[] = $re->detail;
            $pdata[] = $re->total_rent;
        }

        // echo '<pre>';
        // print_r($rt_rent);

        return view('dashboard',['labels'=>$labels, 'data'=>$data,'plabels'=>$plabels, 'pdata'=>$pdata]);
    }
}
