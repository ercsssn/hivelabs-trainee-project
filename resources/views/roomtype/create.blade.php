@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
       <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-primary">Add Room Type
            <a href="{{ url('admin/roomtype') }}" class="float-right btn btn-success btn-sm">View All</a>
           </h6>
       </div>
       <div class="card-body">
           <div class="table-responsive">
               <table class="table table-bordered">
                   <tr>
                       <th>Title</th>
                       <th><input type="text" class="form-control"></th>
                   </tr>
                   <tr>
                    <th>Detail</th>
                    <th><textarea class="form-control"></textarea></th>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" class="btn btn-primary">
                    </td>
                </tr>
               </table>
           </div>
       </div>
   </div>

</div>
<!-- /.container-fluid -->

@endsection