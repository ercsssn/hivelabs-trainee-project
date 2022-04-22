<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Tenant;
use App\Rent;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tenants = Tenant::all();
        return view('rent.create',['tenants'=>$tenants]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tenant_id'=>'required',
            'room_id'=>'required',
            'check_in_date'=>'required',
            'check_out_date'=>'required',
            'total_adults'=>'required',
            'total_children'=>'required',
        ]);

        $data = new Rent;
        $data->tenant_id      = $request->tenant_id;
        $data->room_id        = $request->room_id;
        $data->check_in_date  = $request->check_in_date;
        $data->check_out_date = $request->check_out_date;
        $data->total_adults   = $request->total_adults;
        $data->total_children = $request->total_children;
        $data->save();

        return redirect('admin/rent/create')->with('success','Renter has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //Check available rooms
    function available_rooms(Request $request, $check_in_date) 
    {
        $availrooms=DB::SELECT("SELECT * FROM rooms WHERE id NOT IN (SELECT room_id FROM rents WHERE '$check_in_date' BETWEEN check_in_date AND check_out_date)");
        return response()->json(['data'=>$availrooms]);
    }
}
