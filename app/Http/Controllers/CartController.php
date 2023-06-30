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
            'product_id' => 'required',
        ]);

        $userId = Auth::user()->id;
        $productId = $request->product_id;

        // Cek apakah produk sudah ada dalam keranjang
        $existingCart = cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($existingCart) {
            // Jika produk sudah ada, tambahkan qty-nya
            $existingCart->qty += 1;
            $existingCart->save();
        } else {
            // Jika produk belum ada, tambahkan produk baru ke keranjang
            $cart = new cart;
            $cart->user_id = $userId;
            $cart->product_id = $productId;
            $cart->qty = 1;
            // ... tambahkan atribut lainnya sesuai kebutuhan
            $cart->save();
        }

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

    public function update(Request $request, $id)
    {
        $request->validate([
            'qty' => 'required|integer|min:1',
        ]);

        $cart = cart::findOrFail($id);
        $cart->qty = $request->qty;
        $cart->save();

        // return redirect()->route('cart.update')->with('success', 'Cart quantity updated successfully.');
        return redirect()->to('/cartlist')->with('success', 'Berhasil update data cart');
    }

    public function checkout(Request $request)
    {
        $selectedProducts = $request->input('selected');

        // Mengambil data produk yang dipilih dari database
        $product = cart::whereIn('id', $selectedProducts)->get();

        // Hitung total harga produk yang dipilih
        $total = 0;
        foreach ($products as $product) {
            $subtotal = $product->final_price * $product->qty;
            $total += $subtotal;
        }

        return view('order.index')->with('product', $product)->with('total', $total);
    }
}
