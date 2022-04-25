@extends('frontlayout')
@section('content')
<div class="container my-4">
    <h3 class="mb-3">Register</h3>
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
    <form enctype="multipart/form-data" method= "POST" action="{{url('admin/tenant')}}">
        @csrf
        <table class="table table-bordered">
            <tr>
                <th>Full Name <span class="text-danger">*</span></th>
                <td><input required type="text" class="form-control" name="full_name"></td>
            </tr>
            <tr>
                <th>Email <span class="text-danger">*</span></th>
                <td><input required type="email" class="form-control" name="email"></td>
            </tr>
            <tr>
                <th>Password <span class="text-danger">*</span></th>
                <td><input required type="password" class="form-control" name="password"></td>
            </tr>
            <tr>
                <th>Mobile Number <span class="text-danger">*</span></th>
                <td><input required type="number" class="form-control" name="mobile_number"></td>
            </tr>
            <tr>
                <th>Permanent Address</th>
                <td><input type="text" class="form-control" name="permanent_address"></td>
            </tr>
            <tr>
                <input type="hidden" name="ref" value="front">
                <td colspan="2"><input type="submit" class="btn btn-dark"></td>
            </tr>
        </table>
    </form>
</div>
@endsection