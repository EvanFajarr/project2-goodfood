

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


        {{-- <div class="mb-3 row">
            <label for="code" class="col-sm-2 col-form-label">code</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{Session::get('code')}}" name='code'id="code">
            </div>
        </div> --}}


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
            <label for="desc" class="col-sm-2 col-form-label">Descripsi</label>
            <div class="col-sm-10">
            <textarea class="form-control  summernote" name="desc" value="{{Session::get('desc')}}"  id="desc"></textarea>
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
            <label for="files" class="col-sm-2 col-form-label">Upload Product Images:</label>
            <div class="col-sm-10">
            <input 
                type="file" 
                name="images[]"
                class="form-control" 
                accept="image/*"
                multiple
            >
            </div>
        </div>


        <div class="mb-3 row">
            <label for="foto" class="col-sm-2 col-form-label">Foto Cover</label>
            <div class="col-sm-10">
            <input type="file" class="form-control" name="foto" id="foto">
            </div>
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


@endsection

