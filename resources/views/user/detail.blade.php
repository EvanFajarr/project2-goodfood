@extends('template.user')
@section('konten')
  
         

<div class="row">
    <div class="container fluid">
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h2 class="text-end">Profile</h2>
  @include('pesan.pesan')
    <div class="col-sm-12">
        <div class="card shadow-lg p-3 mb-5 bg-body rounded">
          <div class="card-body">
            <h5 class="card-title">Name : {{ Auth::user()['name'] }}
            </h5>
            <p class="card-text">Alamat : {{ Auth::user()['alamat'] }}
            </p>
            <p class="card-text">Email :  {{ Auth::user()['email'] }}
            </p>
            <p class="card-text">Telephone : {{ Auth::user()['no'] }}
            </p>
            <a href="/orderUser" class="btn btn-outline-dark"><i class="bi bi-list-ol"></i></a>
            <a href= '/editUser'  class="btn btn-outline-warning "><i class="bi bi-pen"></i></a>
                            
        </div>
      
      </div>
 
    <style>
        .card {
            margin-bottom:30px;
        }
        .card-text {
            margin-top:50px;
        }
    </style>
    
  </div>




  





    

@endsection