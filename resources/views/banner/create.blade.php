@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
       <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-primary">Add Banner
            <a href="{{ url('admin/banner') }}" class="float-right btn btn-success btn-sm">View All</a>
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
               <form method="POST" enctype="multipart/form-data" action="{{ url('admin/banner') }}">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Banner <span class="text-danger">*</span></th>
                            <td><input name="banner_src" type="file"></td>
                        </tr>
                        <tr>
                            <th>Alt Text <span class="text-danger">*</span></th>
                            <td><input name="alt_text" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Publish Status</th>
                            <td><input name="publish_status" type="checkbox"></td>
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