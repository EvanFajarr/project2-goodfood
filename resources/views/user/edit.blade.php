
@extends('template.user')
@section('konten')
  
         
<div class="container">
                      
    @include('pesan.pesan')

      <div class="row mt-5">
<div class="card">
    <div class="card-body">
      <form action="editUser" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
        </div>
        <div class="mb-3">
          <label for="no" class="form-label">Phone Number</label>
          <input type="text" name="no" class="form-control" value="{{ Auth::user()->no }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" value="{{ Auth::user()->email }}">
          </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <input type="text" name="alamat" class="form-control" value="{{ Auth::user()->alamat }}">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" class="form-control">
          <small class="form-text text-muted">Leave this blank if you not going to change the password.</small>
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