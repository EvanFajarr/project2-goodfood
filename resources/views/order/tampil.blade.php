
  

@extends('template.admin')
@section('name')  

                    @include('pesan.pesan')

                  
   <!-- START data -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{ url('/orderexport') }}" class="btn btn-success"><i class="bi bi-filetype-csv"></i></a>
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
           @if ($item->status == "selesai")
           @else()
           <a href= '{{url('edit/'.$item->id.'')}}'  class="btn btn-outline-warning btn-sm"><i class="bi bi-pen"></i></a>
           @endif
           <form onsubmit="return confirm('Yakin mau menghapus order?')" class='d-inline' action="{{ url('hapus/'.$item->id) }}" method="post">
            @csrf 
            {{method_field('delete')}}
            <button type="submit" name="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash3-fill"></i></button>
        </form>       
                          
                            </td>
                        </tr>
                        @endforeach
                     
                    </tbody>
                </table>
       
          </div> 
          @endsection