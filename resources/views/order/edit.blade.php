@extends('template.admin') 
@section('name')
<form action='{{ url('edit/'.$order->id.'') }}'  method='post'>
    @csrf
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{url('orderList')}}' class="btn btn-outline-success btn-sm">Kembali</a>
        <div class="mb-3 row">
            <label for="id" class="col-sm-2 col-form-label">Id</label>
            <div class="col-sm-10">
            {{$order->id}}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tanggal" class="col-sm-2 col-form-label">nama</label>
            <div class="col-sm-10">
            {{$order->nama}}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="lokasi" class="col-sm-2 col-form-label">no</label>
            <div class="col-sm-10">
            {{$order->no}}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="detail_lokasi" class="col-sm-2 col-form-label">alamat</label>
            <div class="col-sm-10">
            {{$order->alamat}}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="detail_lokasi" class="col-sm-2 col-form-label">item</label>
            <div class="col-sm-10">
                {{$order->item}}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="detail_lokasi" class="col-sm-2 col-form-label">note</label>
            <div class="col-sm-10">
               {!! $order->note !!}
            </div>
        </div>


        <div class="mb-3 row">
            <label for="status" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
                <select type="text" class="form-control" name='status' value="{{$order->status}}" id="status">
                    @if ($order->status == "terkirim")
                    <option selected>terkirim</option>
                    @else
                    <option >terkirim</option>
                    @endif
                    
                    @if ($order->status == "diproses")
                    <option selected>diproses</option>
                    @else
                    <option >diproses</option>
                    @endif

                    @if ($order->status == "selesai")
                    <option selected>selesai</option>
                    @else
                    <option >selesai</option>
                    @endif

                    @if ($order->status == "pengiriman")
                    <option selected>pengiriman</option>
                    @else
                    <option >pengiriman</option>
                    @endif
                </select>
            
            </div>
            
        <div class="mb-3 row">
            <label for="tahun" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
      
    </div>
</form>
@endsection