@extends('template.admin')
@section('name')  

<form action='{{ url('/category/create') }}'  method='post'>
@include('pesan.pesan')
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{url('category')}}' class="btn btn-primary"><i class="bi bi-skip-backward-btn-fill"></i></a> 
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='name' value="{{Session::get('name')}}" id="name">
            </div>
        </div>
   
        <div class="mb-3 row">
            <label for="code" class="col-sm-2 col-form-label">Code</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='code' value="{{Session::get('code')}}" id="code">
            </div>
        </div>
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
