@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
       <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-primary">Edit Service
            <a href="{{ url('admin/service/') }}" class="float-right btn btn-success btn-sm">View All</a>
           </h6>
       </div>
       <div class="card-body">
           
           @if ($errors->any())
           <div class="alert alert-danger">
               <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
           @endif

           @if(Session::has('success'))
           <p class="alert alert-success">{{ session('success') }}</p>
           @endif
           <div class="table-responsive">
               <form method="POST" enctype="multipart/form-data" action="{{ url('admin/service/'.$data->id) }}">
                    @csrf
                    @method('put')
                    <table class="table table-bordered">
                        <tr>
                            <th>Service <span class="text-danger">*</span></th>
                            <td><input value="{{$data->title}}" name="title" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Short Description</th>
                            <td><textarea name="short_desc" type="text" class="form-control">{{$data->short_desc}}</textarea></td>
                        </tr>
                        <tr>
                            <th>Detailed Description</th>
                            <td><textarea name="detail_desc" type="text" class="form-control">{{$data->detail_desc}}</textarea></td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td>
                                <input name="photo" type="file">
                                <input type="hidden" name="prev_photo" value="{{ $data->photo }}">
                                <img style="height: 300px; width: 300px;" src="{{ asset($data->photo) }}" alt="tenant-photo">

                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" class="btn btn-primary">
                            </td>
                        </tr>
                    </table>
               </form>
           </div>
       </div>
   </div>

</div>
<!-- /.container-fluid -->

@endsection