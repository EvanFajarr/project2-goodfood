<?php

namespace App\Http\Controllers;

use App\Models\cart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
    public function cart(Request $request)
    {
        
      $request->validate([
        'product_id' => 'required|unique:cart',
    ],[
        'product_id.unique' => 'product sudah ada',
    ] );

        $cart = new cart;
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $request->product_id;
        $cart->qty = 1;
        $cart->save();

        return redirect('/')->with('success', 'Berhasil memasukkan product ke cart');
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

         return redirect()->to('/cartlist')->with('success', 'Berhasil menghapus data cart');
     }
}
