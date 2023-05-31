@extends('template.admin')
@section('name')  
  <h2>Images for product : <span class="text-primary">{{$product->name}}</span> </h2>
  <a href="/product" class="btn btn-primary"><i class="bi-skip-backward-btn-fill"></a></i>
  @can('create image')
  <div class="form-group mt-2">
    <form action="/product/add-image/{{ $product->id }}" method="post" enctype="multipart/form-data">
      @csrf
  <label  for="files" class="form-label mt-4">Upload more images:</label>
  <input 
      type="file" 
      value="{{$product->id}}"
      name="images[]"
      class="form-control" 
      accept="image/*"
      multiple
  >

  <div class="mb-3 row">
    <label for="tahun" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-10"><button type="submit" class="btn btn-outline-primary" name="submit"><i class="bi bi-save"></i></button></div>
</div>

</form>
</div>
@endcan
  <div class="row mt-4">
    
    @foreach ($images as $image)
        <div class="col-md-3">
          <div class="card text-white bg-secondary mb-3" style="max-width: 20rem;">
            <div class="card-body text-center">
              <img src="/product_images/{{$image->image}}" class="card-img-top ">
              @can('delete image')
              <form onsubmit="return confirm('Yakin mau menghapus image?')" class='d-inline' action="{{ url('product-images/remove/'.$image->id) }}" method="post">
                @csrf 
                @method('DELETE')
                <button type="submit" name="submit" class="btn btn-danger btn-sm mt-2"><i class="bi bi-trash"></i></button>
            </form>
            @endcan
              {{-- <a href="/product-images/remove/{{$image->id}}" class="btn btn-danger mt-2">delete</a> --}}
            </div>
          </div>
        </div>
    @endforeach
  </div>
@endsection