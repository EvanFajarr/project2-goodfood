
  

@extends('template.admin')
@section('name')  

                    @include('pesan.pesan')

                  
   <!-- START data -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="{{'user'}}" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Search" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Search</button>
                  </form>
                </div>
                <!-- TOMBOL TAMBAH data -->
                <div class="pb-3">
                  <a href='/user/create' class="btn btn-primary"> Tambah User</a>
               </div> 

                
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-2">nama</th>  
                            <th class="col-md-2">email</th>      
                            <th class="col-md-2">alamat</th>  
                            <th class="col-md-2">no</th>      
                            <th class="col-md-2">action</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                        @foreach ($user as $item)
                      
                        <tr>
                        
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->no }}</td>
                            <td>

                               <a href= '{{url('user/'.$item->id.'/show')}}'  class="btn btn-warning btn-sm"><i class="bi bi-pen"></i></a>
                             
                                <form onsubmit="return confirm('Yakin mau menghapus user?')" class='d-inline' action="{{ url('delete/'.$item->id) }}" method="post">
                                    @csrf 
                                    {{method_field('delete')}}
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </form>
                               
                            </td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>
           
          </div> 
          @endsection