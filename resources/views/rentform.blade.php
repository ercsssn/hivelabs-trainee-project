@extends('frontlayout')
@section('content')
<div class="container my-4">
    <h3 class="mb-3">Rent a Room</h3>        
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
                            <p class="mt-3">Price: PHP <span class="show-room-price"></span></p>
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
                            <input type="hidden" name="tenant_id" value="{{ session('data')[0]->id }}">
                            <input type="hidden" name="roomprice" class="room-price" value="">
                            <input type="hidden" name="ref" value="front">
                            <input type="submit" class="btn btn-primary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

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
                        _html+='<option data-price="'+row.roomtype.price+'" value="'+row.room.id+'">'+row.room.title+' - '+row.roomtype.title+'</option>';
                    });
                    $(".room-list").html(_html);

                    let _selectedPrice = $(".room-list").find('option:selected').attr('data-price');
                    $(".room-price").val(_selectedPrice);
                    $(".show-room-price").text(_selectedPrice);
                }
            })
        })
    });

    $(document).on("change",".room-list",function(){
        let _selectedPrice = $(this).find('option:selected').attr('data-price');
        $(".room-price").val(_selectedPrice);
        $(".show-room-price").text(_selectedPrice);
    });
</script>


@endsection