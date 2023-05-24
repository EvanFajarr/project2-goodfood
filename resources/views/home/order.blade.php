
  

@extends('template.user')
@section('konten')  

                    @include('pesan.pesan')

                  
   <!-- START data -->
  
                 

<div class="row">
    <div class="container fluid">
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h2>Your Order</h2>
    @foreach ($order as $item)
    <div class="col-sm-12">
        <div class="card shadow-lg p-3 mb-5 bg-body rounded">
          <div class="card-body">
            <h5 class="card-title">{{ $item->nama }}</h5>
            <p class="card-text">Alamat : {{ $item->alamat }}</p>
            <p class="card-text">Item : {{ $item->item }}</p>
            <p class="card-text">Note : {!! $item->note !!}</p>
            <p class="card-text">Total : {{ $item->total }}</p>
            @if ($item->status == "terkirim")
                                <form onsubmit="return confirm('Yakin mau menghapus order?')" class='d-inline' action="{{ url('hapus/'.$item->id) }}" method="post">
                                    @csrf 
                                    {{method_field('delete')}}
                                    <button type="submit" name="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash3-fill"></i></button>
                                </form>
                                @endif
          </div>
          <div class="card-footer">
           {{ $item->status }}
          </div>
        </div>
      
      </div>
      @endforeach
    <style>
        .card {
            margin-bottom:30px;
        }
    </style>
    
  </div>




  





          @endsection