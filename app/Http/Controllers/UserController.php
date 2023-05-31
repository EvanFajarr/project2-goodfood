<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $user = User::where('id', 'like', "%$katakunci%")
            ->orWhere('name', 'like', "%$katakunci%")
            ->orWhere('email', 'like', "%$katakunci%")
            ->orWhere('role', 'like', "%$katakunci%")
            ->paginate($baris);
    } else {
        $user= User::orderBy ('id','desc')->paginate($baris);
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
      Session::flash('password', $request->password);

      $request->validate([
          'name' => 'required',
          'email' => 'required|email|unique:users',
         
          'password' => 'required|min:8',
      ], );
      $user = [
        'name' => $request->name,
        'email' => $request->email,
      
        'password' => Hash::make($request->password),
    ];

    User::create($user);

    return redirect()->to('user')->with('success', 'Berhasil menambahkan Data User ');
    }


    
    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return redirect()->to('user')->with('success', 'Berhasil menghapus  data');
    }
    


    public function show($id)
    {
        $rolle = Role::all();
        $permissions = Permission::all();
        $user = User::where('id', $id)->first();

        return view('user.rolle', compact('rolle', 'user', 'permissions'));
    }

    public function assignRole(Request $request, $id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $rolle = Role::where('id', $request->rolle)->firstOrFail();
        $user->assignRole($rolle);
        return back();
    }

    public function removeRole(User $user, Role $role)
    {
        if ($user->hasRole($role)) {
            $user->removeRole($role);

            return back()->with('success', 'Role removed.');
        }

        return back()->with('success', 'Role not exists.');
    }


    public function givePermission(Request $request, $id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $permission = Permission::where('id', $request->permision_name)->firstOrFail();
        $user->givePermissionTo($permission);

        return back()->with('success', 'Permission add.');

    }

    public function revokePermission(User $user, Permission $permission)
    {
        if ($user->hasPermissionTo($permission)) {
            $user->revokePermissionTo($permission);

            return back()->with('success', 'Permission revoked.');
        }

        return back()->with('success', 'Permission not exists.');
    }


    // public function edit($id)
    // {
    //     $user = User::where('id', $id)->first();
    //     return view('user.rolle', compact( 'user'));
    // }

    public function update(Request $request,$id)
{
    Session::flash('name', $request->name);
    Session::flash('email', $request->email);
    Session::flash('password', $request->password);

    $request->validate([
        'name' => 'required',
        'email' => 'required',
       
        'password' => 'nullable|min:8',
    ], );

    $user = [
        'name' => $request->name,
        'email' => $request->email,
      
        'password' => Hash::make($request->password),

    ];
    User::where('id', $id)->update($user);

    return redirect('/user')->with('success', 'Berhasil melakukan update data');
}
}
