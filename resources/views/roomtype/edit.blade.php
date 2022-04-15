@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
       <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-primary">Add Room Type
            <a href="{{ url('admin/roomtype/') }}" class="float-right btn btn-success btn-sm">View All</a>
           </h6>
       </div>
       <div class="card-body">  
           @if(Session::has('success'))
           <p class="alert alert-success">{{ session('success') }}</p>
           @endif
           <div class="table-responsive">
               <form method="POST" action="{{ url('admin/roomtype/'.$data->id) }}">
                    @csrf
                    @method('put')
                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <td><input value="{{ $data->title }}" name="title" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Detail</th>
                            <td><textarea name="detail" class="form-control">{{ $data->detail }}</textarea></td>
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