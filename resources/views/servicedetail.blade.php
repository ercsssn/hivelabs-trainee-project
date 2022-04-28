@extends('frontlayout')
@section('content')
<div class="container my-4">
    <h3 class="mb-3">{{$service->title}}</h3>
    <h6>{{$service->short_desc}}</h6>
    <p>{{$service->detail_desc}}</p>

</div>
@endsection