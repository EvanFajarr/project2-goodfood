@extends('template.user')
@section('konten')  


<section class=" slider_section position-relative">
    <div class="side_heading">
  
    </div>
    <div class="container-fluid">
      @include('pesan.pesan')
      <div class="row">
        <div class="col-lg-3 col-md-4 offset-md-1">
          <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                01
              </li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1">
                02
              </li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2">
                03
              </li>
              <li data-target="#carouselExampleIndicators" data-slide-to="3">
                04
              </li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="img-box b-1">
                  <img src="images/slider-img.png" alt="" />
                </div>
              </div>
              <div class="carousel-item">
                <div class="img-box b-2">
                  <img src="images/hot-1.png" alt="" />
                </div>
              </div>
              <div class="carousel-item">
                <div class="img-box b-3">
                  <img src="images/hot-2.png" alt="" />
                </div>
              </div>
              <div class="carousel-item">
                <div class="img-box b-4">
                  <img src="images/hot-3.png" alt="" />
                </div>
              </div>
            </div>
            <div class="carousel_btn-box">
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
        <div class=" col-md-5 offset-md-1">
          <div class="detail-box">
            <h1>
              Good <br>
              Food
            </h1>
            <p>
              There are many variations of passages of Lorem Ipsum available, but the majority have suffered
              alteration in some form, by injected humour, or randomised words
            </p>

            <div class="btn-box">
              <a href="#product" class="btn-2">
                Order Now
              </a>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end slider section -->
</div>

<!-- about section -->
<section class="about_section">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-5 offset-md-1">
        <div class="detail-box">
          <div class="heading_container">
            <h2>
              About <br>
              Our <br>
              Food
            </h2>
            <hr>
          </div>
          <p>
            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration
            in
            some form, by injected humour, or randomised words
          </p>
        </div>
      </div>
      <div class="col-md-6 px-0">
        <div class="img-box">
          <img src="images/about-img.jpg" alt="">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- end about section -->

<!-- dish section -->

<section class="dish_section layout_padding">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="dish_container">
          <div class="box">
            <img src="images/dish.jpg" alt="">
          </div>
          <div class="box">
            <img src="images/dish.jpg" alt="">
          </div>
          <div class="box">
            <img src="images/dish.jpg" alt="">
          </div>
          <div class="box">
            <img src="images/dish.jpg" alt="">
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="detail-box">
          <div class="heading_container">
            <hr>
            <h2>
              Our <br>
              Food <br>
              dishs
            </h2>
          </div>
          <p>
            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration
            in
            some form, by injected humour, or randomised words
          </p>
         
        </div>
      </div>
    </div>
  </div>
</section>

<!-- end dish section -->

<!-- hot section -->
{{--  
 
<section class="hot_section layout_padding" id="product">
  <div class="container">
    <div class="heading_container">
      <h2>
        What's Hot
      </h2>
      <hr>
    </div>
    <p>
      There are many variations of passages of Lorem Ipsum available, but the majority
    </p>
  </div>
  <div class="carousel_container">
    <div class="container">
      <div class="carousel-wrap ">
        <div class="owl-carousel">
    
          <div class="item">
          
            <div class="box">
                @foreach ($product as $item)
            @if ($item->status == "post")
              <div class="detail-box">
                <h4>
                {{$item->harga}}
                </h4>
                <p>
                {{$item->name}}
                </p>
                <div class="btn-group">
                <a href={{route('images',$item->id)}} class="btn btn-outline-dark me-2"><i class="bi bi-eye"></i></a>
                <form action="{{ route('addtocart') }}" method="POST">
                  @csrf
                  <input type="hidden" name="product_id"  value="{{$item->id}}">
                       <button class="btn btn-outline-primary "><i class="bi bi-cart-check"></i></button>
                 <form>
                 </div>
              </div>
              @endif
              @endforeach
            </div>
          
          </div>
        
         
        </div>
      </div>
    </div>
  </div>
</section>   --}}



<section class="case-studies" id="case-studies-section">
  <div  style="padding:50 50 50 50;"class="row grid-margin">
    <div class="col-12 text-center pb-5 mb-5 " id="product">
      <h2 >Product</h2>
    </div>
    @foreach ($product as $item)
    @if ($item->status == "post")
    <div  class="col-12 col-md-6 col-lg-3 stretch-card mb-3 mb-lg-0 " data-aos="zoom-in">
      <div class="card color-cards mt-5">
        <div class="card-body p-0">
          <div class="bg-dark text-center card-contents">
            <div class="card-desc-box d-flex align-items-center justify-content-around">
              <div>
                <h6 class="text-white mt-2 px-3"> Nama : {{ $item->name }}</h6>  
              </div>
            </div>
          </div>
          <div class="card-details text-center pt-4">
              <h6 class="m-0 pb-1">Stok : {{ $item->stok }}</h6>
              <p> Harga : {{ $item->harga }}, Discount : {{ $item->discount ?? 'no discount' }} </p>
              <div class="btn-group">
                <a href={{route('images',$item->id)}} class="btn btn-outline-dark me-2"><i class="bi bi-eye"></i></a>
                
                 </div>
          </div>
        </div>
      </div>
    </div>
    @endif
    @endforeach
    </div>
  </div>
</section>


<!-- app section -->

<section class="app_section">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="img-box">
          <img src="images/man-with-phone.png" alt="">
        </div>
      </div>
      <div class="col-md-6 offset-md-2">
        <div class="detail-box">
          <h2>
            <span> 50% </span> off On every food
            download now our app
          </h2>
          <p>
         Lorem ipsum dolor sit, amet consectetur adipisicing elit. Provident qui est unde!
          </p>
        
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- end app section -->

<!-- client section -->
<script>
  function openNav() {
    document.getElementById("myNav").classList.toggle("menu_width");
    document
      .querySelector(".custom_menu-btn")
      .classList.toggle("menu_btn-style");
  }
</script>

<!-- owl carousel script -->



@endsection
<!-- end client section -->

<!-- contact section -->
