

@extends('template.admin')
@section('name')
    

<form method="post" action="/user/create" >
    
    @include('pesan.pesan')
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{url('user')}}' class="btn btn-outline-success"><i class="bi bi-skip-backward-btn-fill"></i></a>

        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{Session::get('name')}}"  name='name'id="name">
             
            </div>
        </div>

        
      
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control"  value="{{Session::get('email')}}"   name='email'id="email">
            </div>
        </div>

       
   

        <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label">password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control"  value="{{Session::get('password')}}"   name='password'id="password">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="role" class="form-label">rolle</label>
            <select type="text" name="role"  name="role" id="role"  class="form-control">
            <option >user</option>
            <option >admin</option>
          </select>  
        </div>


    
    <div class="mb-3 row">
        <label for="tahun" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-outline-primary" name="submit"><i class="bi bi-save"></i></button></div>
    </div>
</div>

</form>

@endsection

