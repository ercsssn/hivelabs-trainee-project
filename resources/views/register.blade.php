<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project: AMS</title>
    <link rel="shortcut icon" href="{{asset('img/hivelabs_favicon.png')}}">
    <link rel="stylesheet" href="{{asset('bs5/bootstrap.min.css')}}">
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bs5/bootstrap.bundle.min.js')}}" defer></script>
</head>
<body>
  {{-- Nav Bar Start --}}
      <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark px-5">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{url('/')}}">
            <img class="sidebar-brand-icon" style="height: 50px; width:50px;" src="{{asset('img/hivelabs_favicon.png')}}" alt="hivelabs icon"> Hive Apartment</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto px-3">
              @if(Session::has('tenantlogin'))
              <a class="nav-link btn px-3 mx-3" href="{{url('tenant/add_review')}}">Add Review</a>
              <a class="nav-link btn px-3 mx-3" style="background: #ce3003" href="{{url('rent')}}">Rent Now!</a>
              <a class="nav-link" href="{{url('logout')}}">Logout</a>
              @else
              <a class="nav-link" href="{{url('login')}}">Login</a>
              <span class="nav-link">|</span>
              <a class="nav-link" href="{{url('register')}}">Register</a>
              @endif
            </div>
          </div>
        </div>
      </nav>

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

<!-- Footer -->
<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <p class="col-md-4 mb-0 text-muted">?? 2022 Ericsson the Kamote</p>
  
      <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      </a>
  
      <ul class="nav col-md-4 justify-content-end">
        <li class="nav-item"><a href="{{url('/')}}" class="nav-link px-2 text-muted">Home</a></li>
        <li class="nav-item"><a href="{{url('faqs')}}" class="nav-link px-2 text-muted">FAQs</a></li>
        <li class="nav-item"><a href="{{url('about_us')}}" class="nav-link px-2 text-muted">About</a></li>
      </ul>
    </footer>
  </div>
  <!-- End of Footer -->

</body>
</html>