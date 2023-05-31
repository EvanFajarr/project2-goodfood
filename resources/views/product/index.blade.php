
  

@extends('template.admin')
@section('name')  

                    @include('pesan.pesan')

                    {{-- <div class="pb-3">
                        <form class="d-flex" action="{{'product'}}" method="get">
                            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Search" aria-label="Search">
                            <button class="btn btn-secondary" type="submit">Search</button>
                        </form>
                      </div>   --}}

                      <form action="/product" method="get">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label for="" class="form-label">Name</label>
                                <input name="name" type="text" class="form-control" placeholder="Name" value="{{isset($_GET['name']) ? $_GET['name'] : ''}}">  
                            </div>


                            <div class="col-sm-2">
                                <label for="" class="form-label">Stok</label>
                                <input name="stok" type="text" class="form-control" placeholder="stok" value="{{isset($_GET['stok']) ? $_GET['stok'] : ''}}">  
                            </div>
                    
                            <div class="col-sm-2">
                                <label for="" class="form-label">Crated at</label>
                                <input name="created_at" type="date" class="form-control" placeholder="created_at" value="{{isset($_GET['created_at']) ? $_GET['created_at'] : ''}}">  
                            </div>
                           
                            <div class="col-sm-2">
                                <label for="" class="form-label">status</label>
                                <select name="status" class="form-select">
                                    <option value="pending">pending</option>
                                    <option value="post">post</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-outline-primary mt-4">Search</button>
                            </div>
                        </div>
                    </form>
   <!-- START data -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- TOMBOL TAMBAH data -->
                <div class="pb-3">
                    @can('product create')
                  <a href='/product/create' class="btn btn-primary"> <i class="bi bi-cloud-plus-fill"></i></a>
               @endcan
               @can('product export')
                  <a href="{{ url('/productExport') }}" class="btn btn-success"><i class="bi bi-filetype-csv"></i></a>
                @endcan
                @can('product import')
                  <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <i class="bi bi-file-earmark-arrow-up-fill"></i>
                      </button>
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                  <form action="product" method="POST" enctype="multipart/form-data">
                                      @csrf
                                      <div class="input-group mb-3">
                                          <input type="file" name="file" class="form-control">
                                          <button class="btn btn-primary" type="submit">Submit</button>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                      </div>
                      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
              </div>
@endcan

                
          
                <table class="table table-striped">
                    <thead>
                        <h2>Product Post</h2>
                        <tr>
                            <th class="col-md-1">nama</th>
                            <th class="col-md-1">category</th>
                            <th class="col-md-1">stok</th>
                            <th class="col-md-1">discount</th>
                            <th class="col-md-1">harga</th>
                            <th class="col-md-1">finaal price</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                     
                        @foreach ($product as $item)
                        @if ($item->status == "post")
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->subCategory->name ?? 'None' }}</td>
                            <td>{{ $item->stok }}</td>
                            <td>{{ $item->discount ?? 'no discount' }}</td>
                            @php
                                 $discount = $item->discount;
                                   $discountedPrice =(int)$item->harga - ((int)$discount / 100 * (int)$item->harga) ;
                            @endphp
                               <td>{{ $item->harga }}</td>
                            <td> {{ $discountedPrice }}</td>
                            <td>
                                @can('view image')
                                <a href={{route('product.images',$item->id)}} class="btn btn-outline-dark"><i class="bi bi-eye"></i></a>
                              @endcan
                              @can('product edit')
                                <a href= '{{url('product/'.$item->id.'/edit')}}'  class="btn btn-warning btn-sm"><i class="bi bi-pen"></i></a>
                               @endcan
                               @can('product delete')
                                <form onsubmit="return confirm('Yakin mau menghapus data?')" class='d-inline' action="{{ url('product/'.$item->code) }}" method="post">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                       @endif
                        @endforeach
                     
                    </tbody>
                </table>




                <table class="table table-striped">
                    <thead>
                        <h2>Product Pending</h2>
                        <tr>
                            <th class="col-md-1">nama</th>
                            <th class="col-md-1">category</th>
                            <th class="col-md-1">harga</th>
                            <th class="col-md-1">stok</th>
                            <th class="col-md-1">discount</th>
                            <th class="col-md-1">finaal price</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        @foreach ($product as $item)
                        @if ($item->status == "pending")
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->subCategory->name ?? 'None' }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->stok }}</td>
                            <td>{{ $item->discount ?? 'no discount' }}</td>
                            @php
                            $discount = $item->discount;
                              $discountedPrice =(int)$item->harga - ((int)$discount / 100 * (int)$item->harga) ;
                       @endphp
                              <td> {{ $discountedPrice }}</td>
                            <td>
                                @can('view image')
                                <a href={{route('product.images',$item->id)}} class="btn btn-outline-dark"><i class="bi bi-eye"></i></a>
                             @endcan
                             @can('product edit')
                                <a href= '{{url('product/'.$item->id.'/edit')}}'  class="btn btn-warning btn-sm"><i class="bi bi-pen"></i></a>
                                @endcan
                                @can('product delete')
                                <form onsubmit="return confirm('Yakin mau menghapus data?')" class='d-inline' action="{{ url('product/'.$item->code) }}" method="post">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                       @endif
                        @endforeach
                    </tbody>
                </table>


          </div> 




          @endsection