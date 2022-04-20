<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoomType;
use App\RoomTypeImage;
use Illuminate\Support\Facades\Storage;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = RoomType::all();  //paginate| select
        return view('roomtype.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roomtype.create');
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
            'price'=>'required',
            'detail'=>'required',
        ]);
        
        $data = new RoomType;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->detail = $request->detail;
        $data->save();

        foreach ($request->file('imgs') as $img) {
            $imgPath = $img->store('uploads');
            $imgData = new RoomTypeImage;
            $imgData->room_type_id = $data->id;
            $imgData->img_src = $imgPath;
            $imgData->img_alt = $request->title;
            $imgData->save();
        }
        
        return redirect('admin/roomtype/create')->with('success','Room type has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = RoomType::find($id); //dependency injection from model
        return view('roomtype.show', ['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = RoomType::find($id); //dependency injection from model
        return view('roomtype.edit', ['data'=>$data]);  //use with
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
        $data = RoomType::find($id);
        $data->title = $request->title;
        $data->price = $request->price;
        $data->detail = $request->detail;
        $data->save();

        return redirect('admin/roomtype/'.$id.'/edit')->with('success','Room type has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RoomType::where('id',$id)->delete();

        return redirect('admin/roomtype/')->with('success','Room type has been deleted.');
    }

    public function destroy_image($img_id)
    {
        $data = RoomTypeImage::where('id',$img_id)->first();
        Storage::delete($data->img_src);
        
        RoomTypeImage::where('id',$img_id)->delete();
        return response()->json(['bool'=>true]);
    }
}
