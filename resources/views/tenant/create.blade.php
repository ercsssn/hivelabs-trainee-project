@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
       <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-primary">Add Tenant
            <a href="{{ url('admin/tenant') }}" class="float-right btn btn-success btn-sm">View All</a>
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
               <form method="POST" enctype="multipart/form-data" action="{{ url('admin/tenant') }}">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Full Name <span class="text-danger">*</span></th>
                            <td><input name="full_name" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Email <span class="text-danger">*</span></th>
                            <td><input name="email" type="email" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Password <span class="text-danger">*</span></th>
                            <td><input name="password" type="password" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Mobile Number <span class="text-danger">*</span></th>
                            <td><input name="mobile_number" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td><input name="photo" type="file"></td>
                        </tr>
                        <tr>
                            <th>Permanent Address</th>
                            <td><textarea name="permanent_address" type="text" class="form-control"></textarea></td>
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