@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
       <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-primary">Tenant Profile
            <a href="{{ url('admin/tenant') }}" class="float-right btn btn-success btn-sm">View All</a>
           </h6>
       </div>
       <div class="card-body">  
           <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Full Name</th>
                        <td>{{ $data->full_name }}</td>
                    </tr>
                    <tr>
                        <th>Photo</th>
                        <td><img style="height: 300px; width: 300px;" src="{{ asset($data->photo) }}" alt="tenant-photo">
                        </td>
                    </tr>
                    <tr>
                        <th>Mobile Number</th>
                        <td>{{ $data->mobile_number }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $data->email }}</td>
                    </tr>
                    <tr>
                        <th>Permanent Address</th>
                        <td>{{ $data->permanent_address }}</td>
                    </tr>
                </table>

           </div>
       </div>
   </div>

</div>
<!-- /.container-fluid -->

@endsection