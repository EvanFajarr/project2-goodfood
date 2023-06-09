@extends('template.admin')
@section('name')

                  <form action='{{ url('user/'.$user->id.'/show') }}'  method='post' >
                    @csrf
                    @method('PUT')
                        @include('pesan.pesan')
                        <a href='{{url('user')}}' class="btn btn-outline-success"><i class="bi bi-skip-backward-btn-fill"></i></a>
                        <div class="my-3 p-3 bg-body rounded shadow-sm">
                            <div class="mb-3 row">
                                <label for="name" class="col-sm-2 col-form-label">name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name='name' value="{{$user->name}}" id="name">
                                </div>
                            </div>
                          
                                
                           
                          
                          
                                <div class="mb-3 row">
                                    <label for="email" class="col-sm-2 col-form-label">email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name='email' value="{{$user->email}}" id="email">
                                    </div>
                                </div>
                          
                                   
                               
                          
                            
                               

                                <div class="mb-3 row">
                                    <label for="tahun" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10"><button type="submit" class="btn btn-outline-primary" name="submit"><i class="bi bi-save"></i></button></div>
                                </div>
                        </div>
                    </form>
            
                   {{-- <form method="POST" action="{{ url('user/'.$user->id.'/ya') }}">
                            @csrf
                            <div class="my-3 p-3 bg-body rounded shadow-sm">
                                <div class="mb-3 row">
                                    <label for="rolle" class="col-sm-2 col-form-label">rolle name</label>
                                    <div class="col-sm-10">
                                        <select type="text" name="rolle"  name="rolle"  value="{{Session::get('rolle')}}" id="rolle"  class="form-control">
                                                    @foreach ($rolle as $item)
                                                    @if ($item->guard_name == "admin")
                                                <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                                @endif
                                                      @endforeach
                                          </select>
                                    </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="tahun" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">assign</button></div>
                                    </div>
                                </form> --}}
                     

                                @if ($user->roles)
                                @foreach ($user->roles as $user_role)
                              <h5 class="p-5"> Role : {{ $user_role->name }} <h5>
                                @endforeach
                                @endif


                        {{-- <div class="mt-6 p-2 bg-slate-100">
                            <h2 class="text-2xl font-semibold">Roles</h2>
                            <div class="flex space-x-2 mt-4 p-2">
                                @if ($user->roles)
                                    @foreach ($user->roles as $user_role)
                                        <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST"
                                            action="{{ route('users.roles.remove', [$user->id, $user_role->id]) }}"
                                            onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">{{ $user_role->name }}</button>
                                        </form>
                                    @endforeach
                                @endif
                            </div> --}}

                
                    </div>
        

          
                    <form method="POST" action="{{ url('user/'.$user->id.'/show') }}">
                        @csrf
                        <div class="my-3 p-3 bg-body rounded shadow-sm">
                            <div class="mb-3 row">
                                <label for="permision_name" class="col-sm-2 col-form-label">permision </label>
                                <div class="col-sm-10">
                                    <select type="text" name="permision_name"  name="permision_name"  value="{{Session::get('permision_name')}}" id="permision_name"  class="form-control">
                                                @foreach ($permissions as $item)
                                            <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                                     @endforeach
                                      </select>
                                </div>
                             
                                <div class="mb-3 row">
                                    <label for="tahun" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">assign</button></div>
                                </div>
                               
                            </form>
                    


            <div class="my-3 p-3 bg-body">
                        <h5 class="text-2xl font-semibold">User Permissions</h5>
                        <div class="my-3 p-3 bg-body">
                            @if ($user->permissions)
                                @foreach ($user->permissions as $user_permission)
                                    <form class="bg-red-500 hover:bg-red-700 text-white rounded-md " method="POST"
                                        action="{{ route('users.permissions.revoke', [$user->id, $user_permission->id]) }}"
                                        onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <div class="btn-group float-right p-4">
                                        <button type="submit" class="btn btn-outline-danger">{{ $user_permission->name }}</button>
                                        </div>
                                    </form>
                                 
                                      
                                @endforeach
                            @endif
                        </div>   
       
        
@endsection