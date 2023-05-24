
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">


<title>Detail</title>
  <div class="container mt-5 mb-5">
    <div  class="row d-flex justify-content-center">
        <div class="col-md-12 ">
            <div class="card ">
                <div class="row ">
                    <div class="col-md-6">
                            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                </div>
                                <div class="carousel-inner ">
                                    @foreach ($images as $image)
                                    <div class="carousel-item active">
                                      
                                        <img style='height:500px;width:100%' src="/product_images/{{$image->image}}" class="d-block w-100" alt="mid"/>
                                    
                                      
                                      </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                  </button>
                                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                  </button>
                              </div>
                          
                    </div>
                    <div class="col-md-6">
                        <div class="kolom p-4">
                            <a href='{{url('/')}}' class="btn btn-outline-success"><i class="bi bi-skip-backward-btn-fill"></i></a>
                            <div class="mt-4 mb-3"> <h5 class="text-uppercase text-muted brand">stok : {{ $product->stok }}</h5>
                                <h2 class="text-uppercase">{{ $product->name }}</h2>
                                <div class="lokasi d-flex flex-row align-items-center">
                                    <h2 class="lokasi">{{ $product->discount ?? 'no discount'}} </h2>
                                    <div class="ml-2">
                                      <h2>,{{$product->harga }}</h2>
                                </div>
                            </div>
                            <h5 class="text-bottom">Category : {{$product->subCategory->name ?? 'None' }} </h5>
                            <form action="{{ route('addtocart') }}" method="POST">
                              @csrf
                              <input type="hidden" name="product_id"  value="{{$product->id}}">
                                   <button class="btn btn-outline-primary "><i class="bi bi-cart-check"></i></button>
                             <form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<style>
              .card{
                border:none;
            }
            .card:hover{
              transform: scale(1.05);
              top:-10px;
              box-shadow: 0 10px 20px rgba(20, 14, 14, 0.12), 0 4px 8px rgba(0,0,0,.06);
            }
            .kolom{
              background-color: #eee;
             height:100%;
            }
         
            .lokasi{
              color:red;
              font-weight: 700;
              }
                  .cart i{
                              margin-right: 10px
                              }

                              .col-md-12{
                                height:100vh;
                              }
</style>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>