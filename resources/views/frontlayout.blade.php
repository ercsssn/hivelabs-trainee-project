<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
          <div class="navbar-nav">
              <a class="nav-link px-4" href="#rooms">Rooms</a>
              <a class="nav-link px-3" aria-current="page" href="#services">Services</a>
              <a class="nav-link px-3" aria-current="page" href="#reviews">Reviews</a>
          </div>
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
            <main>
                @yield('content')
            </main>

      <!-- Footer -->
      <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
          <p class="col-md-4 mb-0 text-muted">© 2022 Ericsson the Kamote</p>
      
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

      <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>