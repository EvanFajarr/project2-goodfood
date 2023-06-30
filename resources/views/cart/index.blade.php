 {{-- @extends('template.user')
@section('konten')



        <div class="container">
          <div class="row mt-5">
            @include('pesan.pesan')
            <div class="col mt-2">
              <h4>
             Your Cart
              </h4>
              @php
                  $total = 0;
                  $itemTotal = 0;
              @endphp
              <div class="card">
                    <div class="card-body">
                      @if(!empty($product))
                        @foreach ($product as $data => $value)
                        @php
                        
                        @endphp
                        <div class="row">
                          <div class="col-5">
                            <h4>{{$value->product->name}}   </h4>
                            <p class="text-danger">Price  : {{$value->product->harga}} </p>
                            <p class="text-danger">quantity : {{ $value->qty }}</p>
                            <p class="text-danger">Discount  : {{$value->product->discount}}</p>
                            @php
                            $discount = $value->product->discount;
                              $discountedPrice =(int)$value->product->harga - ((int)$discount / 100 * (int)$value->product->harga) ;
                              // $total = $total + str_replace(".","",str_replace(",00","",str_replace('Rp ', '' , (int)$discountedPrice)))
                              $itemTotal = $discountedPrice * $value->qty;
                       $total += $itemTotal;
                       @endphp

            @php
            $printTotal = "Rp " . number_format($total, 0, '.', '.') . ",00";
              @endphp 
                          <p class="text-danger fw-bold">Final Price : {{ $itemTotal}}</p> 
                         {{-- <p>Final Price : {{ $printTotal}}</p> --}}
                         
                           {{-- <form action="{{ route('cart.update', $value->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="number" name="qty" value="{{ $value->qty }}" min="1" required>
                            <button class="btn btn-outline-primary" type="submit">Update</button>
                        </form>

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
              
                 $printTotal = "Rp " . number_format($total, 0, '.', '.') . ",00";
               // $printTotal =    $total = $total + str_replace(".","",str_replace(",00","",str_replace('Rp ', '' , (int)$printTotal)))
                  @endphp
                  <div class="m-3 text-right">
                    <p class="text-muted">Total : {{$printTotal}}</p>
                    <a href="/checkout" class="btn btn-danger @if($total == 0) disabled @endif" ><i class="bi bi-basket"></i></a>
                  </div>
                </div>
              </div>
            </div>

        
            
@endsection 



  



 --}}


 @extends('template.user')
@section('konten')
<div class="container">
  <div class="row mt-5">
    @include('pesan.pesan')
    <div class="col mt-2">
      <h4>Your Cart</h4>
      @php
      $total = 0;
      $itemTotal = 0;
      @endphp
      <div class="card">
        <div class="card-body">
          @if(!empty($product))
          <form action="{{ route('cart.checkout') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-1">
                <input type="checkbox" id="select-all" class="form-check-input">
              </div>
              <div class="col-4">
                <h5>Product</h5>
              </div>
              <div class="col-2">
                <h5>Price</h5>
              </div>
              <div class="col-2">
                <h5>Quantity</h5>
              </div>
              <div class="col-2">
                <h5>Discount</h5>
              </div>
              <div class="col-1">
                <h5>Final Price</h5>
              </div>
              
            </div>
            <hr>
            @foreach ($product as $data => $value)
            @php
            $discount = $value->product->discount;
                              $discountedPrice =(int)$value->product->harga - ((int)$discount / 100 * (int)$value->product->harga) ;
                              // $total = $total + str_replace(".","",str_replace(",00","",str_replace('Rp ', '' , (int)$discountedPrice)))
                              $itemTotal = $discountedPrice * $value->qty;
                       $total += $itemTotal;
            @endphp

@php
$printTotal = "Rp " . number_format($total, 0, '.', '.') . ",00";
  @endphp 
 @php
 $selected = $value->selected ? 1 : 0;
@endphp
            <div class="row">
              <div class="col-1">
                <input type="checkbox" name="selected[]" value="{{ $value->id }}" class="form-check-input" @if ($value->selected) checked @endif>
              </div>
              
              <div class="col-4">
                <h5>{{ $value->product->name }}</h5>
              </div>
              <div class="col-2">
                <p class="text-danger">{{ $value->product->harga }}</p>
              </div>
              <div class="col-2">
                <p class="text-danger">Quantity : {{ $value->qty }}</p>
                <form action="{{ route('cart.update', $value->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input style="width:50px;" type="number" name="qty" value="{{ $value->qty }}" min="1" required>
                            <button class="btn-small btn-outline-primary mt-2" type="submit">Update</button>
                        </form>

              </div>
              <div class="col-2">
                <p class="text-danger"> {{ $value->product->discount }}</p>
              </div>
              <div class="col-1">
                <p class="text-danger fw-bold"> {{ $itemTotal }}</p>
              </div>
            </div>
            <hr>
            @endforeach
            <div class="m-3 text-right">
            <a href="/checkout" class="btn btn-danger @if($total == 0) disabled @endif text-right" ><i class="bi bi-basket"></i></a>
            </div>
          </form>
          @else
          <div>
            Your cart is empty
          </div>
          @endif
        </div>
      </div>
      @php 
                 $printTotal = "Rp " . number_format($total, 0, '.', '.') . ",00";
               // $printTotal =    $total = $total + str_replace(".","",str_replace(",00","",str_replace('Rp ', '' , (int)$printTotal)))
                  @endphp
      <div class="m-3 text-right">
        <p class="text-muted">Total: {{ $printTotal }}</p>
      </div>
    </div>
  </div>
</div>



@endsection

