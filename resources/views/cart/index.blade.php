@extends('template.user')
@section('konten')



        <div class="container">
          <div class="row mt-5">
            <div class="col mt-2">
              <h4>
             Your Cart
              </h4>
              @php
                  $total = 0;
              @endphp
              <div class="card">
                    <div class="card-body">
                      @if(!empty($product))
                        @foreach ($product as $data => $value)
                        @php
                        
                        @endphp
                        <div class="row">
                          <div class="col-5">
                            <h4>{{$value->product->name}}</h4>
                            <p>Price  : {{$value->product->harga}}</p>
                            <p>Price  : {{$value->product->discount}}</p>
                            @php
                            $discount = $value->product->discount;
                              $discountedPrice =(int)$value->product->harga - ((int)$discount / 100 * (int)$value->product->harga) ;
                              $total = $total + str_replace(".","",str_replace(",00","",str_replace('Rp ', '' , (int)$discountedPrice)))
                       @endphp
                           <p>Final Price : {{ $discountedPrice }}</p>
                            <hr>
                          </div>
                          <div class="col">
                            <p class="text-right">
                              <a href='/hapuscart/{{ $value->id }}' class="btn btn-danger"><i class="bi bi-trash"></i></a>   
                            
                              </a>
                            </p>
                          </div>
                        </div> <!-- row -->
                        @endforeach
                        
                      @else
                        <div>
                          Your cart is empty
                        </div>
                      @endif
                    </div>
                  </div>
                  @php
                  $printTotal = "Rp ".number_format($total, 0, '.', '.').",00";
                  @endphp
                  <div class="m-3 text-right">
                    <p class="text-muted">Total : {{$printTotal}}</p>
                    <a href="/checkout" class="btn btn-danger @if($total == 0) disabled @endif" ><i class="bi bi-basket"></i></a>
                  </div>
                </div>
              </div>
            </div>

        
     
@endsection 



  



