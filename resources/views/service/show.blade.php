@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
       <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-primary">Service Detail
            <a href="{{ url('admin/service') }}" class="float-right btn btn-success btn-sm">View All</a>
           </h6>
       </div>
       <div class="card-body">  
           <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Service</th>
                        <td>{{ $data->title }}</td>
                    </tr>
                    <tr>
                        <th>Short Description</th>
                        <td>{{ $data->short_desc }}</td>
                    </tr>
                    <tr>
                        <th>Detailed Description</th>
                        <td>{{ $data->detail_desc }}</td>
                    </tr>
                    <tr>
                        <th>Photo</th>
                        <td><img style="height: 300px; width: 300px;" src="{{ asset($data->photo) }}" alt="tenant-photo">
                        </td>
                    </tr>
                </table>

           </div>
       </div>
   </div>

</div>
<!-- /.container-fluid -->

@endsection