@extends('frontlayout')
@section('content')
<div class="container my-4">
    <h3 class="mb-3">Login</h3>
    @if (Session::has('error'))
    <div class="alert alert-danger">
        <strong>Error!</strong> {{session('error')}}<br><br>
    </div>
    @endif
           
       @if(Session::has('success'))
       <p class="alert alert-success">{{ session('success') }}</p>
       @endif
    <form enctype="multipart/form-data" method= "POST" action="{{url('tenant/login')}}">
        @csrf
        <table class="table table-bordered"> 
            <tr>
                <th>Email <span class="text-danger">*</span></th>
                <td><input required type="email" class="form-control" name="email"></td>
            </tr>
            <tr>
                <th>Password <span class="text-danger">*</span></th>
                <td><input required type="password" class="form-control" name="password"></td>
            </tr>
            <tr>
                <input type="hidden" name="ref" value="front">
                <td colspan="2"><input type="submit" class="btn btn-dark"></td>
            </tr>
        </table>
    </form>
</div>
@endsection