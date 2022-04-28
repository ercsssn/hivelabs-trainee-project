@extends('frontlayout')
@section('content')
<div class="container my-4">
    <h3 class="mb-3">About Us</h3>
    <p>Welcome to [store name], your number one source for all things [product, ie: shoes, bags, dog treats]. We're dedicated to giving you the very best of [product], with a focus on [three characteristics, ie: dependability, customer service and uniqueness.]
        Founded in [year] by [founder's name], [store name] has come a long way from its beginnings in a [starting location, ie: home office, toolshed, Houston, TX.]. When [store founder] first started out, his/her passion for [passion of founder, ie: helping other parents be more eco-friendly, providing the best equipment for his fellow musicians] drove him to [action, ie: do intense research, quit her day job], and gave him the impetus to turn hard work and inspiration into to a booming online store. We now serve customers all over [place, ie: the US, the world, the Austin area], and are thrilled to be a part of the [adjective, ie: quirky, eco-friendly, fair trade] wing of the [industry type, ie: fashion, baked goods, watches] industry.
        
        We hope you enjoy our products as much as we enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact us.
        
        Sincerely,
        Name, [title, ie: CEO, Founder, etc.]</p>

    <h3 class="mb-3">Contact Us</h3>          
        @if(Session::has('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
        @endif
    <form enctype="multipart/form-data" method= "POST" action="{{url('tenant/save_review')}}">
        @csrf
        <table class="table table-bordered"> 
            <tr>
                <th>Full Name</th>
                <td><input type="text" name="full_name" class="form-control"></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type="email" name="email" class="form-control"></td>
            </tr>
            <tr>
                <th>Subject</th>
                <td><input type="text" name="subject" class="form-control"></td>
            </tr>
            <tr>
                <th>Message<span class="text-danger">*</span></th>
                <td><textarea name="msg" class="form-control" rows="8"></textarea></td>
            </tr>
            <tr>
                <input type="hidden" name="ref" value="front">
                <td colspan="2"><input type="submit" class="btn btn-dark"></td>
            </tr>
        </table>
    </form>
</div>
@endsection