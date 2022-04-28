@extends('frontlayout')
@section('content')
<div class="container my-4">
    <h3 class="mb-3">Add Review</h3>
    @if (Session::has('error'))
    <div class="alert alert-danger">
        <strong>Error!</strong> {{session('error')}}<br><br>
    </div>
    @endif
           
       @if(Session::has('success'))
       <p class="alert alert-success">{{ session('success') }}</p>
       @endif
    <form enctype="multipart/form-data" method= "POST" action="{{url('tenant/save_review')}}">
        @csrf
        <table class="table table-bordered"> 
            <tr>
                <th>Review<span class="text-danger">*</span></th>
                <td><textarea name="review" class="form-control" rows="8"></textarea></td>
            </tr>
            <tr>
                <input type="hidden" name="ref" value="front">
                <td colspan="2"><input type="submit" class="btn btn-dark"></td>
            </tr>
        </table>
    </form>
</div>
@endsection