@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
       <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-primary">Room Rent
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
               <form method="POST" enctype="multipart/form-data" action="{{ url('admin/rent') }}">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Select Tenant<span class="text-danger">*</span></th>
                            <td>
                                <select class="form-control" name="tenant_id">
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
                                <select class="form-control room-list" name="room_id">

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
            let _checkindate=$(this).val();
            //Ajax sir
            $.ajax({
                url:"{{url('admin/rent')}}/available_rooms/" + _checkindate,
                dataType:'json',
                beforeSend: function() {
                    $(".room-list").html('<option>--- Loading ---</option>');
                },
                success:function(res) {
                    let _html='';
                    $.each(res.data, function(index,row) {
                        _html+='<option value="'+row.id+'">'+row.title+'</option>';
                    });
                    $(".room-list").html(_html);
                }
            })
        })
    }) 

</script>
@endsection


@endsection