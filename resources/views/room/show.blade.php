@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
       <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-primary">Add Room
            <a href="{{ url('admin/rooms') }}" class="float-right btn btn-success btn-sm">View All</a>
           </h6>
       </div>
       <div class="card-body">  
           <div class="table-responsive">
                <table class="table table-bordered">
                    <tr class="d-flex">
                        <th class="col-2">Title</th>
                        <td class="col-5">{{ $data->title }}</td>
                    </tr>
                    <tr class="d-flex">
                        <th class="col-2">Room Type</th>
                        <td class="col-5">{{ $data->roomType->title }}</td>
                    </tr>
                </table>

           </div>
       </div>
   </div>

</div>
<!-- /.container-fluid -->

@endsection