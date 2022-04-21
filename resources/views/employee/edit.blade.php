@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
       <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-primary">Edit Employee
            <a href="{{ url('admin/employee') }}" class="float-right btn btn-success btn-sm">View All</a>
           </h6>
       </div>
       <div class="card-body">  
           @if(Session::has('success'))
           <p class="alert alert-success">{{ session('success') }}</p>
           @endif
           <div class="table-responsive">
            <form enctype="multipart/form-data" method="POST" action="{{ url('admin/employee/'.$data->id) }}">
                @method('put')
                @csrf
                <table class="table table-bordered">
                    <tr>
                        <th>Full Name</th>
                        <td><input value="{{$data->full_name}}" name="full_name" type="text" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Select Department</th>
                        <td>
                            <select name="department_id" class="form-control">
                                <option value="0">--- Select ---</option>
                                @foreach ($depts as $employee )
                                <option @if ($data->id == $employee->id) selected @endif value="{{$employee->id}}">{{$employee->title}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Photo</th>
                        <td>
                            <input name="photo" type="file">
                            <input type="hidden" value="{{$data->photo}}" name="prev_photo">
                            <img style="height: 100px; width: 100px; " src="{{ asset($data->photo) }}" alt="employee photo">
                        </td>
                    </tr>
                    <tr>
                        <th>Bio</th>
                        <td><textarea class="form-control" name="bio">{{$data->bio}}</textarea></td>
                    </tr>
                    <tr>
                        <th>Salary Type</th>
                        <td>
                            <input @if ($data->salary_type == 'daily') checked @endif type="radio" name="salary_type" value="daily"> Daily
                            <input @if ($data->salary_type == 'monthly') checked @endif type="radio" name="salary_type" value="monthly"> Monthly
                        </td>
                    </tr>
                    <tr>
                        <th>Salary Amount</th>
                        <td><input value="{{$data->salary_amt}}" class="form-control" name="salary_amt" type="number"></td>
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