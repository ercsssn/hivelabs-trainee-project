@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
       <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-primary">Add Service
            <a href="{{ url('admin/service') }}" class="float-right btn btn-success btn-sm">View All</a>
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
               <form method="POST" enctype="multipart/form-data" action="{{ url('admin/service') }}">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Service <span class="text-danger">*</span></th>
                            <td><input name="title" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Short Description<span class="text-danger">*</span></th>
                            <td><textarea name="short_desc" class="form-control"></textarea></td>
                        </tr>
                        <tr>
                            <th>Detailed Description<span class="text-danger">*</span></th>
                            <td><textarea name="detail_desc" class="form-control"></textarea></td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td><input name="photo" type="file"></td>
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