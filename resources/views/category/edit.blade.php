@extends('template.admin')
@section('name')  
 
<!-- START FORM -->


<form action='{{ url('category/'.$category->code.'/edit') }}'  method='post' >
    @include('pesan.pesan')
    @csrf
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{url('category')}}' class="btn btn-primary"><i class="bi bi-skip-backward-btn-fill"></i></a> 
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='name' value="{{$category->name}}" id="name">
            </div>
        </div>
       

        <div class="mb-3 row">
            <label for="status" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
                <select type="text" class="form-control" name='status' value="{{$category->status}}" id="status">
                    @if ($category->status == "post")
                    <option selected>post</option>
                    @else
                    <option >post</option>
                    @endif

                    @if ($category->status == "pending")
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