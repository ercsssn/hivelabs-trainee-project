@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
       <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-primary">Add Employee Payment
            <a href="{{ url('admin/employee/payments/'.$employee_id) }}" class="float-right btn btn-success btn-sm">View All</a>
           </h6>
       </div>
       <div class="card-body">  
           @if(Session::has('success'))
           <p class="alert alert-success">{{ session('success') }}</p>
           @endif
           <div class="table-responsive">
               <form enctype="multipart/form-data" method="POST" action="{{ url('admin/employee/payment/'.$employee_id) }}">    
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Employee ID</th>
                            <td><input value="{{$employee_id}}" name="employee_id" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                        <tr>
                            <th>Amount</th>
                            <td><input name="amount" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td><input name="amount_date" class="form-control" type="date"></td>
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