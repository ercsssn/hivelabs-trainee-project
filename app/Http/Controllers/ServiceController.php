<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Service::all();
        return view('service.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service.create');
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
            'title'=>'required',
            'short_desc'=>'required',
            'detail_desc'=>'required',
            'photo'=>'required',
        ]);

        if ($request->hasFile('photo')) {
            $imgPath = $request->file('photo')->store('uploads/');
        }else {
            $imgPath=null;
        }
        

        $data = new Service;
        $data->title        = $request->title;
        $data->short_desc   = $request->short_desc;
        $data->detail_desc  = $request->detail_desc;
        $data->photo        = $imgPath;
        $data->save();

        return redirect('admin/service/create')->with('success','Service has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Service::find($id);
        return view('service.show', ['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Service::find($id);
        return view('service.edit', ['data'=>$data]);
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
            'title'=>'required',
            'short_desc'=>'required',    //whitelist |tri-catch
            'detail_desc'=>'required',
            'prev_photo'=>'required'
        ]);

        if ($request->hasFile('photo')) {
            $imgPath = $request->file('photo')->store('uploads/');
        }else{
            $imgPath = $request->prev_photo;
        }
        

        $data = Service::find($id);
        $data->title       = $request->title;
        $data->short_desc  = $request->short_desc;
        $data->detail_desc = $request->detail_desc;
        $data->photo       = $imgPath;
        $data->save();

        return redirect('admin/service/'.$id.'/edit')->with('success','Service has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::where('id',$id)->delete();

        return redirect('admin/service/')->with('success','Service has been deleted.');
    }
}
