@extends('template.admin')
@section('name')  

<form action='{{ url('/Subcategory/create') }}'  method='post'>
@include('pesan.pesan')
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{url('Subcategory')}}' class="btn btn-primary"><i class="bi bi-skip-backward-btn-fill"></i></a> 


        <div class="mb-3 row">
            <label for="parent_id" class="col-sm-2 col-form-label">category</label>
            <div class="col-sm-10">
                <select type="text" name="parent_id"  name="parent_id"  value="{{Session::get('parent_id')}}" id="parent_id"  class="form-control">
                    @foreach ($category as $item)
                    @if ($item->status == "post")
                    <option value="{{ $item->id }}"> {{ $item->name }}</option>
                    @endif
                    @endforeach
                  </select>
            </div>
        </div>



        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Sub Category</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='name' value="{{Session::get('name')}}" id="name">
            </div>
        </div>
   
        {{-- <div class="mb-3 row">
            <label for="code" class="col-sm-2 col-form-label">Code</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='code' value="{{Session::get('code')}}" id="code">
            </div>
        </div> --}}
        <div class="mb-3 row">
            <label for="status" class="form-label">status</label>
            <select type="text" name="status"  name="status" id="status"  value="{{Session::get('status')}}"  class="form-control">
            <option value="pending" >pending</option>
            <option value="post">post</option>
          </select>  
        </div>
        <div class="mb-3 row">
            <label for="tahun" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    
    </div>
   
</form>

@endsection
