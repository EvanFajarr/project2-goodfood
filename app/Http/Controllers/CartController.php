<?php

namespace App\Http\Controllers;

use App\Models\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
    public function cart(Request $request)
    {
        $cart = new cart;
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $request->product_id;
        $cart->save();

        return redirect('/')->with('success', 'Berhasil memasukkan roti ke cart');
    }

     public function cartpage()
     {
         $userId = Auth::user()->id;
         $product = cart::where('user_id', $userId)->get();

         return view('cart.index')->with('product', $product);
     }

     public function hapuscart($id)
     {
         cart::where('id', $id)->delete();

         return redirect()->to('')->with('erorr', 'Berhasil menghapus data cart');
     }
}
