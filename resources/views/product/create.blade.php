

@extends('template.admin')
@section('name')


<form method="post" action="/product/create" enctype="multipart/form-data">
    
    @include('pesan.pesan')
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{url('product')}}' class="btn btn-outline-success"><i class="bi bi-skip-backward-btn-fill"></i></a>

        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{Session::get('name')}}" name='name'id="name">
            </div>
        </div>


        <div class="mb-3 row">
            <label for="code" class="col-sm-2 col-form-label">code</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{Session::get('code')}}" name='code'id="code">
            </div>
        </div>


        <div class="mb-3 row">
            <label for="harga" class="col-sm-2 col-form-label">harga</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{Session::get('harga')}}" onkeyup="sum();"  name='harga'id="harga">
            </div>
        </div>
        
        <div class="mb-3 row">
            <label for="stok" class="col-sm-2 col-form-label">stok</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" value="{{Session::get('stok')}}" name='stok'id="stok">
            </div>
        </div>
        
        <div class="mb-3 row">
            <label for="discount" class="col-sm-2 col-form-label">discount</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{Session::get('discount')}}" onkeyup="sum();"    name='discount'id="discount">
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
    
        {{-- <div class="mb-3 row">
            <label for="total" class="col-sm-2 col-form-label">total</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{Session::get('total')}}"  onkeyup="sum();"    name='total'id="total">
            </div>
        </div> --}}

       

        {{-- <div class="mb-3 row">
            <label for="image" class="col-sm-2 col-form-label">image</label>
            <div class="col-sm-10">
            <input type="file" class="form-control" name="image[]" multiple>
            </div>
        </div> --}}
     

        <div class="form-group">
            <label for="files" class="form-label mt-4">Upload Product Images:</label>
            <input 
                type="file" 
                name="images[]"
                class="form-control" 
                accept="image/*"
                multiple
            >
        </div>
        <div class="mb-3 row">
            <label for="status" class="form-label">status</label>
            <select type="text" name="status"  name="status"  value="{{Session::get('status')}}" id="status"  class="form-control">
            <option value="pending" >pending</option>
            <option value="post">post</option>
          </select>  
        </div>
    
    <div class="mb-3 row">
        <label for="tahun" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-outline-primary" name="submit"><i class="bi bi-save"></i></button></div>
    </div>
</div>

</form>
{{-- <script>
    function sum() {
        var harga = document.getElementById('harga').value;
        var discount = document.getElementById('discount').value;
        var result = parseFloat(hargabarang)  - parseFloat(discount);
        if (!isNaN(result)) {
            document.getElementById('total').value = result;
        }
    }
</script> --}}

@endsection

