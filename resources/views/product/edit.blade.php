@extends('template.admin')
@section('name')  
 
<!-- START FORM -->



<form action='{{ url('product/'.$product->id.'/edit') }}'  method='post' enctype="multipart/form-data" >
    @include('pesan.pesan')
    @csrf
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{url('product')}}' class="btn btn-primary"><i class="bi bi-skip-backward-btn-fill"></a></i>
        
      
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='name' value="{{$product->name}}" id="name">
            </div>
        </div>
       

        <div class="mb-3 row">
            <label for="harga" class="col-sm-2 col-form-label">harga</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='harga' value="{{$product->harga}}" id="harga">
            </div>
        </div>
       
        <div class="mb-3 row">
            <label for="category_id" class="col-sm-2 col-form-label">category</label>
            <div class="col-sm-10">
                <select type="text" name="category_id"  name="category_id" value="{{Session::get('category_id')}}" id="category_id"  class="form-control">
                    @foreach ($data as $item)
                    @if ($item->status == "post")
                    <option value="{{ $item->id }}">{{  $item->category->name ?? 'None' }}->{{ $item->name }}</option>
                    @endif
                    @endforeach
                  </select>
            </div>
        </div>
    

        <div class="mb-3 row">
            <label for="stok" class="col-sm-2 col-form-label">stok</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='stok' value="{{$product->stok}}" id="stok">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="discount" class="col-sm-2 col-form-label">discount</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='discount' value="{{$product->discount}}" id="discount">
            </div>
        </div>

     



        <div class="mb-3 row">
            <label for="status" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
                <select type="text" class="form-control" name='status' value="{{$product->status}}" id="status">
                    @if ($product->status == "post")
                    <option selected>post</option>
                    @else
                    <option >post</option>
                    @endif

                    @if ($product->status == "pending")
                    <option selected>pending</option>
                    @else
                    <option >pending</option>
                    @endif

                </select>

            </div>


        <div class="mb-3 row">
            <label for="tahun" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    
    </div>
</form>
    <!-- AKHIR FORM -->
    @endsection