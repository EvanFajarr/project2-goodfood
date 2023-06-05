
@extends('template.user')
@section('konten')
  
         
<div class="container">
                      
    @include('pesan.pesan')

      <div class="row mt-5">
        <div class="mb-3 text-right">
          <a href="/orderUser" class="btn btn-danger">Back to order</a>
        </div>
<div class="card">
    <div class="card-body">
        <form action='{{ url($order->code) }}'  method='post'>
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" name='nama' value="{{$order->nama}}" id="nama">
        </div>
        <div class="mb-3">
          <label for="no" class="form-label">Phone Number</label>
          <input type="text" class="form-control" name='no' value="{{$order->no}}" id="no">
        </div>
       
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <input type="text" class="form-control" name='alamat' value="{{$order->alamat}}" id="alamat">
        </div>
        <div class="mb-3 row">
            <label for="note" class="col-sm-2 col-form-label">note</label>
            <div class="col-sm-10">
                <textarea   class="form-control  summernote" name="note"  id="note">

                    {{ $order->note }}
                </textarea>
            </div>
        </div>
        <div class="mb-3 text-center">
          <button type="submit" class="btn btn-outline-warning">edit</button>
        </div>
      </form>
    </div>
  </div>
      </div>
</div>

  @endsection