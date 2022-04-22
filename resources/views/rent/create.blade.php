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
                            <th>Select Tenant<span class="text-danger">*</span></th>
                            <td>
                                <select class="form-control">
                                    <option>--- Select Tenant ---</option>
                                    @foreach ($tenants as $tenant )
                                    <option value="{{$tenant->id}}">{{$tenant->full_name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Check-in Date <span class="text-danger">*</span></th>
                            <td><input name="check_in_date" type="date" class="form-control checkin-date"></td>
                        </tr>
                        <tr>
                            <th>Check-out Date<span class="text-danger">*</span></th>
                            <td><input name="check_out_date" type="date" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Available Rooms<span class="text-danger">*</span></th>
                            <td>
                                <select class="form-control room">

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Total Adults<span class="text-danger">*</span></th>
                            <td><input name="total_adults" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Total Children<span class="text-danger">*</span></th>
                            <td><input name="total_children" type="text" class="form-control"></td>
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

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $(".checkin-date").on('blur',function(){
            var _checkindate=$(this).val();
            //Ajax sir
            $.ajax({
                url:"{{url('admin/rent')}}/available_rooms/" + _checkindate,
                dataType:'json',
                success:function(res) {
                    console.log(res);
                }
            })
        })
    }) 

</script>
@endsection


@endsection