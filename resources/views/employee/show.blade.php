@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
       <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-primary">{{$data->full_name}} Profile
            <a href="{{ url('admin/employee') }}" class="float-right btn btn-success btn-sm">View All</a>
           </h6>
       </div>
       <div class="card-body">  
           <div class="table-responsive">
                <table class="table table-bordered">
                    <tr class="d-flex">
                        <th class="col-2">Full Name</th>
                        <td class="col-5">{{ $data->full_name }}</td>
                    </tr>
                    <tr class="d-flex">
                        <th class="col-2">Department</th>
                        <td class="col-5">{{ $data->department->title ?? 'unknown' }}</td>
                    </tr>
                    <tr class="d-flex">
                        <th class="col-2">Photo</th>
                        <td class="col-5"><img style="height: 100px; width: 100px; " src="{{ asset($data->photo) }}" alt="employee photo"></td>
                    </tr>
                    <tr class="d-flex">
                        <th class="col-2">Bio</th>
                        <td class="col-5">{{ $data->bio }}</td>
                    </tr>
                    <tr class="d-flex">
                        <th class="col-2">Salary Type</th>
                        <td class="col-5">{{ $data->salary_type }}</td>
                    </tr>
                    <tr class="d-flex">
                        <th class="col-2">Salary Amount</th>
                        <td class="col-5">{{ $data->salary_amt }}</td>
                    </tr>
                </table>

           </div>
       </div>
   </div>

</div>
<!-- /.container-fluid -->

@endsection