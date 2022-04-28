@extends('frontlayout')
@section('content')

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
      <div class="container my-4" id="rooms">
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

      <div class="my-4 services" id="services">
        <h2 class="text-center pb-2 border-bottom">Services</h2>
        @foreach($services as $service)
        <div class="row my-4">
          <div class="col-md-4">
             <a href="{{url('service/'.$service->id)}}"></a><img style="height: 300px; width: 400px;" src="{{ asset($service->photo) }}" alt="service-photo">
          </div>
          <div class="col-md-8">
            <h3>{{$service->title}}</h3>
            <h6>{{$service->short_desc}}</h6>
            <p>
              <a href="{{url('service/'.$service->id)}}" class="btn btn-sm btn-primary">Read More</a>
            </p>
          </div>
        </div>
        @endforeach
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
@endsection
</body>
</html>