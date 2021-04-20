<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>wellcome|Home</title>
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/node_modules/owl.carousel/dist/assets/owl.carousel.min.css')}}" />




    <style>

    </style>

</head>
<body>
    {{-- Start Navbar --}}
    <header class="header-bg">
        <div class="row">
            <div class="col-md-6 container" >
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand text-white" href="#">Omio</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                          <a class="nav-link text-white" href="#">Our Loans <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-white" href="#">About us </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Nova Blogs </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Nova Blogs </a>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-warning">Apply</button>
                        </li>
                    </div>
                  </nav>
            </div>
        </div>
    </header>{{-- End Navbar --}}

    {{-- Start Slider --}}
    <section>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner slider-container">

              @foreach ($getData as $key => $value)
              <div class="carousel-item {{$key== 0 ? 'active' : ''}}">
                <img class="d-block w-100 slider-img" src="{{asset('admin/images/slider/'.$value->image)}}"  alt="First slide">
                <div class="content">
                    <h2>{{$value->desc}}</h2>
                </div>
                <div class="apply-btn">
                    <button class="btn btn-warning btn-lg">Apply</button>
                </div>
              </div>
              @endforeach

            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
    </section> {{-- End Slider --}}

        {{-- <div class="owl-carousel owl-theme">
            <div> Your Content </div>
            <div> Your Content </div>
            <div> Your Content </div>
            <div> Your Content </div>
            <div> Your Content </div>
            <div> Your Content </div>
            <div> Your Content </div>
        </div> --}}


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script>
    $(document).ready(function(){
  $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:1,
            nav:true,
            loop:false
        }
    }
  });
});
</script>
</body>
</html>
