<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tenant;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tenant::all();
        return view('tenant.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tenant.create');
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
            'full_name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'mobile_number'=>'required',
        ]);


        $imgPath = $request->file('photo')->store('uploads/');

        $data = new Tenant;
        $data->full_name         = $request->full_name;
        $data->email             = $request->email;
        $data->password          = sha1($request->password);
        $data->mobile_number     = $request->mobile_number;
        $data->permanent_address = $request->permanent_address;
        $data->photo             = $imgPath;
        $data->save();

        return redirect('admin/tenant/create')->with('success','Tenant has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Tenant::find($id);
        return view('tenant.show', ['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Tenant::find($id);
        return view('tenant.edit', ['data'=>$data]);
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
        $request->validate([
            'full_name'=>'required',
            'email'=>'required|email',
            'mobile_number'=>'required',
        ]);

        if ($request->hasFile('photo')) {
            $imgPath = $request->file('photo')->store('uploads/');
        }else{
            $imgPath = $request->prev_photo;
        }
        

        $data = Tenant::find($id);
        $data->full_name         = $request->full_name;
        $data->email             = $request->email;
        $data->password          = sha1($request->password);
        $data->mobile_number     = $request->mobile_number;
        $data->permanent_address = $request->permanent_address;
        $data->photo             = $imgPath;
        $data->save();

        return redirect('admin/tenant/'.$id.'/edit')->with('success','Tenant has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tenant::where('id',$id)->delete();

        return redirect('admin/tenant/')->with('success','Tenant has been deleted.');
    }
}