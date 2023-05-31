
  

@extends('template.admin')
@section('name')  

                    @include('pesan.pesan')

                    <form action="/orderList" method="get">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <label for="" class="form-label">Name</label>
                                <input name="nama" type="text" class="form-control" placeholder="nama" value="{{isset($_GET['nama']) ? $_GET['nama'] : ''}}">  
                            </div>
                    
                            <div class="col-sm-3">
                                <label for="" class="form-label">Crated at</label>
                                <input name="created_at" type="date" class="form-control" placeholder="created_at" value="{{isset($_GET['created_at']) ? $_GET['created_at'] : ''}}">  
                            </div>
                           
                            <div class="col-sm-3">
                                <label for="" class="form-label">status</label>
                                <select name="status" class="form-select">
                                    <option value="terkirim">terkirim</option>
                                    <option value="proses">proses</option>
                                    <option value="proses">proses</option>
                                    <option value="pengiriman">pengiriman</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-outline-primary mt-4">Search</button>
                            </div>
                        </div>
                    </form>
   <!-- START data -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            @can('order export')
            <a href="{{ url('/orderexport') }}" class="btn btn-success"><i class="bi bi-filetype-csv"></i></a>
            @endcan
                <table class="table table-striped">
                    <thead>
                        <tr>

                            <th class="col-md-1">nama</th>
                            <th class="col-md-1">alamat</th>
                            <th class="col-md-4">item</th>
                            <th class="col-md-1">nomor hp</th>
                            <th class="col-md-1">status</th>
                            <th class="col-md-2">pesanan</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>            
                        @foreach ($order as $item)
                        <tr>
              
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->item }}</td>
                            <td>{{ $item->no }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->created_at->diffForHumans() }}</td>
                            <td>
                                @can('order edit')
           @if ($item->status == "selesai")
           @else()
           <a href= '{{url('edit/'.$item->id.'')}}'  class="btn btn-outline-warning btn-sm"><i class="bi bi-pen"></i></a>
           @endif
           @endcan

           @can('order delete')
           <form onsubmit="return confirm('Yakin mau menghapus order?')" class='d-inline' action="{{ url('hapus/'.$item->id) }}" method="post">
            @csrf 
            {{method_field('delete')}}
            <button type="submit" name="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash3-fill"></i></button>
        </form>  
        @endcan     
                          
                            </td>
                        </tr>
                        @endforeach
                     
                    </tbody>
                </table>
       
          </div> 
          @endsection