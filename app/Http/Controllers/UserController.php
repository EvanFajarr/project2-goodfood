<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

   
  public function index(Request $Request){
    // $user=User::all();
    // return view('user.index')->with('user',$user);

    $katakunci = $Request->katakunci;
    $baris = 5;
    if (strlen($katakunci)) {
        $user = admin::where('id', 'like', "%$katakunci%")
            ->orWhere('name', 'like', "%$katakunci%")
            ->orWhere('email', 'like', "%$katakunci%")
              ->paginate($baris);
    } else {
        $user= admin::orderBy ('id','desc')->paginate($baris);
    }

    return view('user.index')->with('user',$user);

  }

  public function create()
  {
      return view('user.create');
  }

  public function store(Request $request)
  {
      Session::flash('name', $request->name);
      Session::flash('email', $request->email);
    //   Session::flash('alamat', $request->alamat);
    //   Session::flash('no', $request->no);
      Session::flash('password', $request->password);

      $request->validate([
          'name' => 'required',
          'email' => 'required|email|unique:admin',
        //   'alamat' => 'required',
        //   'no' => 'required|min:11',
          'password' => 'required|min:8',
      ], );
      $user = [
        'name' => $request->name,
        'email' => $request->email,
        // 'alamat' => $request->alamat,
        // 'no' => $request->no,
        'password' => Hash::make($request->password),
    ];

  $user =  admin::create($user);
    $user->assignRole('1');
    $user = [
                  'name' => $request->name,
                  'email' => $request->email,
                  'password' => $request->password,
                //   'alamat' => $request->alamat,
                //   'no' => $request->no,
              ];
    return redirect()->to('user')->with('success', 'Berhasil menambahkan Data Admin ');
    }


    
    public function destroy($id)
    {
        admin::where('id', $id)->delete();

        return redirect()->to('user')->with('success', 'Berhasil menghapus  data');
    }
    


    public function show($id)
    {
        $rolle = Role::all();
        $permissions = Permission::all();
        $user = admin::where('id', $id)->first();

        return view('user.rolle', compact('rolle', 'user', 'permissions'));
    }

    // public function assignRole(Request $request,admin $user,  $id)
    // {
    //     $user = admin::where('id', $id)->firstOrFail();
    //     $rolle = Role::where('id', $request->rolle)->firstOrFail();
    //     $user->assignRole($rolle);
    //     return back();
     
    
    // }

  
    // public function removeRole(admin $user, Role $role)
    // {
    //     if ($user->hasRole($role)) {
    //         $user->removeRole($role);

    //         return back()->with('success', 'Role removed.');
    //     }

    //     return back()->with('success', 'Role not exists.');
    // }


    public function givePermission(Request $request, $id)
    {
        $user = admin::where('id', $id)->firstOrFail();
        $permission = Permission::where('id', $request->permision_name)->firstOrFail();
        $user->givePermissionTo($permission);

        return back()->with('success', 'Permission add.');

    }

    public function revokePermission(admin $user, Permission $permission)
    {
        if ($user->hasPermissionTo($permission)) {
            $user->revokePermissionTo($permission);

            return back()->with('success', 'Permission revoked.');
        }

        return back()->with('success', 'Permission not exists.');
    }


    

    public function update(Request $request,$id)
{
    Session::flash('name', $request->name);
    Session::flash('email', $request->email);
    Session::flash('password', $request->password);

    $request->validate([
        'name' => 'required',
        'email' => 'required',
    ], );

    $user = [
        'name' => $request->name,
        'email' => $request->email,
  

    ];
    admin::where('id', $id)->update($user);

    return redirect('/user')->with('success', 'Berhasil melakukan update data');
}






public function detail(){
    return view('user.detail');
}


public function edit(Request $request){
    if($request->isMethod('put')){
        
        $validate = $request->validate([
            'name'      => 'required|max:25',
            'alamat'   => 'required',
            'email' => 'required',
            'no'    => 'required|max:20',
            'password'  => 'nullable|min:8',
        ]);

        if($validate){
            if(!empty($request['password'])){
                $password = Hash::make($request['password']);
            }else{
                $password = Auth::user()->password;
            }
            // $user = User::find(Auth::guard('user')->id());
            $user = User::find(Auth::user()->id);
            $user->name     = $request['name'];
            $user->alamat   = $request['alamat'];
            $user->no       = $request['no'];
            $user->email       = $request['email'];
            $user->password = $password;
            if($user->save()){
     
                return redirect('/detailUser')->with('success','Berhasil Update Data User');
            }
        }
    }
    return view('user.edit');
}
}
