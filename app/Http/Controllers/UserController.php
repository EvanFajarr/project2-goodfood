<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
  public function index(){
    $user=User::all();
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
      Session::flash('role', $request->role);
      Session::flash('password', $request->password);

      $request->validate([
          'name' => 'required',
          'email' => 'required|email|unique:users',
          'role' => 'required',
          'password' => 'required|min:8',
      ], );
      $user = [
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
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
    
}
