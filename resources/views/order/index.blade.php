
  

@extends('template.user')
@section('konten')  

                  
                    <div class="container">
                      
                    @include('pesan.pesan')

                      <div class="row mt-5">
                    
                        <div class="mb-3 text-right">
                          <a href="/cartlist" class="btn btn-danger">Back to Cart</a>
                        </div>
                        <div class="col-12">
                          <div class="card">
                            <div class="card-body">
                              <form action="" method="POST">
                                @csrf
                                @if (Auth::check())
                                <div class="mb-3">
                                  <label for="name" class="form-label">Name</label>
                                  <input type="text" name="nama" class="form-control" value="{{ Auth::user()['name'] }}">
                                </div>
                             
                                <div class="mb-3">
                                  <label for="alamat" class="form-label">alamat</label>
                                  <input type="text" name="alamat" value="{{ Auth::user()['alamat'] }}" class="form-control">
                                </div>

                                <div class="mb-3">
                                  <label for="name" class="form-label">Phone Number</label>
                                  <input type="text" name="no" value="{{ Auth::user()['no'] }}" class="form-control">
                                </div>
                                <div class="mb-3">
                                  <label for="name" class="form-label">Note</label>
                                  <textarea name="note"  cols="30" rows="10" class="form-control summernote"></textarea>
                                </div>

                                <div class="mb-3 row">
                                  <label for="item" class="col-sm-2 col-form-label">Item</label>
                                  <div class="col-sm-10">
                                    @if ($product->isEmpty())
                                      <input type="text" class="form-control" value="No selected product" readonly>
                                    @else
                                      @foreach ($product as $item)
                                        <input type="text" class="form-control" name="item[]" value="{{ $item->product->name }}" readonly>
                                      @endforeach
                                    @endif
                                  </div>
                                </div>
                                
                              
                            <div class="mb-3 row">
                              @php
                              $total=0
                          @endphp
                              <label for="total"  class="col-sm-2 col-form-label">total</label>
                              @if(!empty($product))
                              @foreach ($product as $data => $value)
                              @php
                              $discount = $value->product->discount;
                                $discountedPrice =(int)$value->product->harga - ((int)$discount / 100 * (int)$value->product->harga) ;
                                $total = $total + str_replace(".","",str_replace(",00","",str_replace('Rp ', '' , (int)$discountedPrice)))
                         @endphp
                                  
                                @endforeach
                                @endif
                                @php
                                $total = "Rp ".number_format($total, 0, '.', '.').",00";
                                @endphp
                              <div class="col-sm-10"  name="total" >
                                <input type="text" name="total" class="form-control"
                                 value=" {{$total}} " readonly >    
                              </div>
                          </div>
                          
                                @endif
                            </div>
                          </div>
                        </div>
                  


                        
                        <div class="col-12">
                          @php
                              $total=0
                          @endphp
                          <div class="card">
                            <div class="card-body">
                                  @if(!empty($product))
                                  @foreach ($product as $data => $value)
                                  @php
                                  $discount = $value->product->discount;
                                    $discountedPrice =(int)$value->product->harga - ((int)$discount / 100 * (int)$value->product->harga) ;
                                    $total = $total + str_replace(".","",str_replace(",00","",str_replace('Rp ', '' , (int)$discountedPrice)))
                             @endphp
                                      
                                    @endforeach
                                  @else
                                    <div>
                                      empty
                                    </div>
                                  @endif
                                </div>
                              </div>
                              @php
                              $total = "Rp ".number_format($total, 0, '.', '.').",00";
                              @endphp
                              <div class="m-3 text-right">
                                <p class="text-muted">Total : {{$total}}</p>
                      
                                  <button type="submit" onclick="return confirm('Apakah data diri sudah benar?');"  name="submit" class="btn btn-danger">Order</button>
                            
                              </div>
                            </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
          @endsection