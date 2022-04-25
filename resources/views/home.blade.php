<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <link rel="shortcut icon" href="{{asset('img/hivelabs_favicon.png')}}">
    <link rel="stylesheet" href="{{asset('bs5/bootstrap.min.css')}}">
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bs5/bootstrap.bundle.min.js')}}" defer></script>
</head>
<body>
  {{-- Nav Bar Start --}}
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img class="sidebar-brand-icon" style="height: 50px; width:50px;" src="{{asset('img/hivelabs_favicon.png')}}" alt="hivelabs icon"> Hive Apartment</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto px-3">
              <a class="nav-link px-3" aria-current="page" href="#">Services</a>
              <a class="nav-link px-4" href="#">Gallery</a>
              <a class="nav-link btn px-3" style="background: #ce3003" href="#">Rent Now!</a>
            </div>
          </div>
        </div>
      </nav>
      {{-- Nav bar End --}}

      {{-- Slider Section Start --}}
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{asset('img/banner-1.png')}}" class="d-block w-100" alt="banner">
          </div>
          <div class="carousel-item">
            <img src="{{asset('img/banner-2.png')}}" class="d-block w-100" alt="banner">
          </div>
          <div class="carousel-item">
            <img src="{{asset('img/banner-3.jpg')}}" class="d-block w-100" alt="banner">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      {{-- Slider Section End --}}
      
      {{-- Gallery Section Start --}}
      <div class="container my-4">
        <h2 class="text-center pb-2 border-bottom">Rooms</h2>
        <div class="row my-4">
          @foreach ($roomTypes as $rtype)
          <div class="col md-3">
            <div class="card">
              <h6 class="card-header">{{$rtype->title}}</h6>
              <div class="card-body">
                @foreach ($rtype->roomtypeimgs as $index => $img )
                <a href="{{ asset($img->img_src) }}" data-lightbox="rgallery{{$rtype->id}}">
                  @if ($index > 0)
                  <img class="img-fluid hide" style="height: 230px; width: 270px;" src="{{ asset($img->img_src) }}" alt="roomtype photo">
                  @else
                  <img class="img-fluid" style="height: 230px; width: 270px;" src="{{ asset($img->img_src) }}" alt="roomtype photo">
                  @endif
                </a>
                @endforeach
                
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      {{-- Gallery Section End --}}

      {{-- Services Section Start --}}

      <div class="my-4 services">
        <h2 class="text-center pb-2 border-bottom">Services</h2>
        <div class="row my-4">
          <div class="col-md-4">
            <img src="{{asset('img/catering.jpg')}}" class="img-thumbnail" alt="catering">
          </div>
          <div class="col-md-8">
            <h3>Catering</h3>
            <p>Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.</p>
            <p>
              <a href="" class="btn btn-sm btn-primary">Read More</a>
            </p>
          </div>
        </div>

        <div class="row my-4">
          <div class="col-md-4">
            <img src="{{asset('img/laundry.jpg')}}" class="img-thumbnail" alt="catering">
          </div>
          <div class="col-md-8">
            <h3>Laundry</h3>
            <p>Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.</p>
            <p>
              <a href="" class="btn btn-sm btn-primary">Read More</a>
            </p>
          </div>
        </div>

        <div class="row my-4">
          <div class="col-md-4">
            <img src="{{asset('img/cleaning.jpg')}}" class="img-thumbnail" alt="catering">
          </div>
          <div class="col-md-8">
            <h3>Cleaning</h3>
            <p>Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.</p>
            <p>
              <a href="" class="btn btn-sm btn-primary">Read More</a>
            </p>
          </div>
        </div>
      </div>

      {{-- Services Section End --}}
      
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
          <div class="container my-auto">
              <div class="copyright text-center my-auto">
                  <span>Copyright &copy; Ericsson the Kamote 2022</span>
              </div>
          </div>
      </footer>
      <!-- End of Footer -->

      
      <link rel="stylesheet" type="text/css" href="{{asset('vendor/lightbox2-2.11.3/dist/css/lightbox.min.css')}}">
      <script type="text/javascript" src="{{asset('vendor/lightbox2-2.11.3/dist/js/lightbox.min.js')}}"></script>

<style>
.services {
  margin: 0px; 
  padding-left: 100px; 
  padding-right: 100px; 
  padding-top: 50px;
  padding-bottom: 50px;
  background:#bebebe; 
}

.hide {
  display: none;
}

h2 {
  border-color: black;
}

</style>
</body>
</html>