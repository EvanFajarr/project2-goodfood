@extends('template.admin')
@section('name')  
 

@include('pesan.pesan')

<form action="/Subcategory" method="get">
    @csrf
    <div class="row mb-3">
        <div class="col-sm-3">
            <label for="" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" placeholder="Name" value="{{isset($_GET['name']) ? $_GET['name'] : ''}}">  
        </div>

        <div class="col-sm-3">
            <label for="" class="form-label">Crated at</label>
            <input name="created_at" type="date" class="form-control" placeholder="created_at" value="{{isset($_GET['created_at']) ? $_GET['created_at'] : ''}}">  
        </div>
       
        <div class="col-sm-3">
            <label for="" class="form-label">status</label>
            <select name="status" class="form-select">
                <option value="pending">pending</option>
                <option value="post">post</option>
            </select>
        </div>
        <div class="col-sm-3">
            <button type="submit" class="btn btn-outline-primary mt-4">Search</button>
        </div>
    </div>
</form>
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                    @can('Subcategory create')
                    <a href='{{url('Subcategory/create')}}' class="btn btn-primary"> <i class="bi bi-cloud-plus-fill"></i></a>
                  @endcan
                  @can('Subcategory export')
                    <a href="{{ url('/subCategoryExport') }}" class="btn btn-success"><i class="bi bi-filetype-csv"></i></a>
                    @endcan
                    @can('Subcategory import')
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="bi bi-file-earmark-arrow-up-fill"></i>
                        </button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="Subcategory" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <input type="file" name="file" class="form-control">
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                </div>

                </div>
                @endcan

               
          
                <table class="table table-striped">
                    <h5>SubCategory Post</h5>
                    <thead>
                        <tr>
                            <th class="col-md-1">id</th>
                            <th class="col-md-1"> Category</th>
                            <th class="col-md-1"> Sub Category</th>
                            <th class="col-md-1">Code</th>
                            <th class="col-md-1">Status</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($subCategory as $item)
                        @if ($item->status == "post")
                        <tr>
                            
                            <td>{{$item->id}}</td>
                            <td>{{$item->category->name ?? 'None' }}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->code}}</td>
                            <td>{{$item->status}}</td>
                            <td>
                                @can('Subcategory edit')
                                <a href= '{{url('Subcategory/'.$item->code.'/edit')}}'  class="btn btn-warning btn-sm"><i class="bi bi-pen"></i></a>
                                @endcan
                                @can('Subcategory delete')
                                <form onsubmit="return confirm('Yakin mau menghapus data?')" class='d-inline' action="{{ url('Subcategory/'.$item->code) }}" method="post">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </form>
                            @endcan
                            </td>
                        </tr>
               @endif
                        @endforeach 
                    </tbody>
                 </table>
        </div>



        <div class="my-3 p-3 bg-body rounded shadow-sm">
                 <table class="table table-striped">
                    <h5>SubCategory pending</h5>
                    <thead>
                        <tr>
                            <th class="col-md-1">id</th>
                            <th class="col-md-1">Category</th>
                            <th class="col-md-1">Sub Category</th>
                            <th class="col-md-1">Code</th>
                            <th class="col-md-1">Status</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($subCategory as $item)
                        @if ($item->status == "pending")
                        <tr>
                            
                            <td>{{$item->id}}</td>
                            <td>{{$item->category->name ?? 'None' }}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->code}}</td>
                            <td>{{$item->status}}</td>
                            <td>
                                @can('Subcategory edit')
                                <a href= '{{url('Subcategory/'.$item->code.'/edit')}}'  class="btn btn-warning btn-sm"><i class="bi bi-pen"></i></a>
                                @endcan
                                @can('Subcategory delete')
                                <form onsubmit="return confirm('Yakin mau menghapus data?')" class='d-inline' action="{{ url('Subcategory/'.$item->code) }}" method="post">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </form>
                            @endcan
                            </td>
                        </tr>
               @endif
                        @endforeach 
                    </tbody>
                 </table>

    
          @endsection 