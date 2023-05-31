<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    public function index()
    {

        return view('login.index');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email' => 'Email wajib diisi',
            'password' => 'Pasword wajib diisi',
        ]);
        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($infologin)) {
            return redirect('/')->with('success', 'Berhasil login');
        } else {
            return redirect('/login')->withErrors('Username dan Password salah');
        }
    }

  public function logout(Request $request)
  {
      Auth::logout();

      return redirect('/')->withErrors('success', 'Berhasil Logout');
      // if(Auth::user()->check()){
      //     Auth::user()->logout();
      // }
      //    return redirect()->route('login');;
  }

     public function register()
     {
         return view('login.register');
     }

  public function create(Request $request)
  {
      $request->validate([
          'name' => 'required',
          'email' => 'required|email|unique:users',
          'password' => 'required|min:8',
          'alamat' => 'required',
          'no' => 'required|min:11',
      ], [
          'name' => 'Name wajib diisi',
          'email' => 'Email wajib diisi',
          'email.email' => 'Silahkan masukan email dengan benar',
          'email.unique' => 'Email sudah digunakan, silakan masukkan email yang lain',
          'password' => 'Pasword wajib diisi',
          'password.min' => 'Pasword harus lebih dari 8',
      ]);

      $data = [
          'name' => $request->name,
          'email' => $request->email,
          'alamat' => $request->alamat,
          'no' => $request->no,
          'password' => Hash::make($request->password),
      ];
      User::create($data);

      $infologin = [
          'name' => $request->name,
          'email' => $request->email,
          'password' => $request->password,
          'alamat' => $request->alamat,
          'no' => $request->no,
      ];

      if (Auth::attempt($infologin)) {
          return redirect('/')->with('success', 'success login');
      } else {
          return redirect('login')->withErrors('Username dan Password salah');
      }
  }
}
