<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Tenant;
use App\Rent;
use App\RoomType;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rent = Rent::all();
        return view('rent.index', ['data'=>$rent]);
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
            'roomprice'=>'required',
        ]);

        

        if ($request->ref == 'front') {
            $sessionData = [
                'tenant_id'=>$request->tenant_id,
                'room_id'=>$request->room_id,
                'check_in_date'=>$request->check_in_date,
                'check_out_date'=>$request->check_out_date,
                'total_adults'=>$request->total_adults,
                'total_children'=>$request->total_children,
                'roomprice'=>$request->roomprice,
                'ref'=>$request->ref
            ];
            session($sessionData);
            \Stripe\Stripe::setApiKey('sk_test_51KsgjJL6Qqk9yP2mqVLCwp2dhDSKtRY42LoAcfhEU0OEtvMMyBRGvHJr1vWpwRUXivxhCoJOVNhfj1nksAQtxtQl00UE63J1dr');
            $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'php',
                    'product_data'=> [
                        'name' => $request->room_id,
                    ],
                    'unit_amount' => $request->roomprice*100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => 'http://test.com/rent/success?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => 'http://test.com/rent/fail',
            ]);

            return redirect($session->url);
        // return redirect('rent')->with('success','Rent request submitted.');
        }else {
            $data = new Rent;
            $data->tenant_id      = $request->tenant_id;
            $data->room_id        = $request->room_id;
            $data->check_in_date  = $request->check_in_date;
            $data->check_out_date = $request->check_out_date;
            $data->total_adults   = $request->total_adults;
            $data->total_children = $request->total_children;
            
            if ($request->ref == 'front') {
                $data->ref = 'user';
            }else {
                $data->ref = 'admin';
            }
            $data->save();

            return redirect('admin/rent/create')->with('success','Renter has been added.');
        }
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
        Rent::where('id',$id)->delete();

        return redirect('admin/rent/')->with('success','Record has been deleted.');
    }

    //Check available rooms
    function available_rooms(Request $request, $check_in_date) 
    {
        $availrooms=DB::SELECT("SELECT * FROM rooms WHERE id NOT IN (SELECT room_id FROM rents WHERE '$check_in_date' BETWEEN check_in_date AND check_out_date)");

        $data = [];
        foreach($availrooms as $room)
        {
            $roomTypes = RoomType::find($room->room_type_id);
            $data[] = ['room'=>$room, 'roomtype'=>$roomTypes];
        }

        return response()->json(['data'=>$data]);   
    }

    public function front_rent()
    {
        return view('rentform');
    }

    function rent_payment_success(Request $request)
    {
        \Stripe\Stripe::setApiKey('sk_test_51KsgjJL6Qqk9yP2mqVLCwp2dhDSKtRY42LoAcfhEU0OEtvMMyBRGvHJr1vWpwRUXivxhCoJOVNhfj1nksAQtxtQl00UE63J1dr');
        $session = \Stripe\Checkout\Session::retrieve($request->get('session_id'));
        $tenant = \Stripe\Customer::retrieve($session->customer);
        if ($session->payment_status == 'paid') {

            $data = new Rent;
            $data->tenant_id      = session('tenant_id');
            $data->room_id        = session('room_id');
            $data->check_in_date  = session('check_in_date');
            $data->check_out_date = session('check_out_date');
            $data->total_adults   = session('total_adults');
            $data->total_children = session('total_children');
            if (session('ref') == 'front') {
                $data->ref = 'user';
            }else {
                $data->ref = 'admin';
            }
            $data->save();
            
            return view('rent.success');
        }
    }

    function rent_payment_fail(Request $request)
    {
        return view('rent.fail');
    }
}
