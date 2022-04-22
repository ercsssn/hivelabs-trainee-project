@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
       <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-primary">{{$employee->full_name}}Payments
               <a href="{{ url('admin/employee/payment/'.$employee_id.'/add') }}" class="float-right btn btn-success btn-sm">Add New Payment</a> 
           </h6>
       </div>
       <div class="card-body">
           @if(Session::has('success'))
           <p class="alert alert-success">{{ session('success') }}</p>
           @endif
           <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                       <tr>
                           <th>#</th>
                           <th>Amount</th>
                           <th>Payment Date</th>
                           <th>Action</th>
                       </tr>
                   </thead>
                   <tfoot>
                       <tr>
                           <th>#</th>
                           <th>Amount</th>
                           <th>Payment Date</th>
                           <th>Action</th>
                       </tr>
                   </tfoot>
                   <tbody>
                       @if ($data)
                           @foreach ($data as $d)  {{-- I just used $d as the iteration variable --}}
                           <tr>
                               <td>{{ $d->id }}</td>
                               <td>{{ $d->amount}}</td>   
                               <td>{{ $d->payment_date ?? 'unknown' }}</td>
                               <td>
                                   <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to remove this record?')" href="{{ url('admin/employee/payment/'.$d->id.'/'.$employee_id).'/delete' }}"><i class="fa fa-trash"></i></a>
                               </td>
                           </tr>
                           @endforeach
                       @endif
                   </tbody>
               </table>
           </div>
       </div>
   </div>

</div>
<!-- /.container-fluid -->

@section('scripts')
<!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Page level plugins -->
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('js/demo/datatables-demo.js')}}"></script>
@endsection

@endsection