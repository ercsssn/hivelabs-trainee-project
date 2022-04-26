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
          <div class="navbar-nav">
              <a class="nav-link px-4" href="#rooms">Rooms</a>
              <a class="nav-link px-3" aria-current="page" href="#services">Services</a>
          </div>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto px-3">
              @if(Session::has('tenantlogin'))
              <a class="nav-link" href="{{url('logout')}}">Logout</a>
              <a class="nav-link btn px-3 mx-3" style="background: #ce3003" href="{{url('rent')}}">Rent Now!</a>
              @else
              <a class="nav-link" href="{{url('login')}}">Login</a>
              <span class="nav-link">|</span>
              <a class="nav-link" href="{{url('register')}}">Register</a>
              <a class="nav-link btn px-3 mx-3" style="background: #ce3003" href="#">Rent Now!</a>
              @endif
            </div>
          </div>
        </div>
      </nav>
            <main>
                @yield('content')
            </main>
</body>
</html>