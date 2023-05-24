<?php

namespace App\Http\Controllers;


use App\Models\cart;
use App\Models\order;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index()
    {
        return view('order.index', [

            $userId = Auth::user()->id,
            'product' => cart::where('user_id', $userId)->get(),
        ]);
    }

    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validate = $request->validate([
                'nama' => 'required',
                'alamat' => 'required',
                'no' => 'required',
                'note' => 'nullable|max:255',
                'item' => 'required',
                'total' => 'required',

            ]);
            $order = new order;
            $order->user_id = Auth::user()->id;
            $order->nama = $request['nama'];
            $order->no = $request['no'];
            $order->note = $request['note'];
            $order->alamat = $request['alamat'];
            $order->status = 'terkirim';
            $order->item = $request['item'];
            $order->total = $request['total'];
            if ($order->save()) {
                Session::forget('cart');

                return redirect('/')->with('success', 'Berhasil Transaksi');
            }

        }

        return view('checkout')->with('data', $data)->with('session', $session)->with('success', 'Berhasil Transaksi');
    }



    public function user()
    {
        $userId = Auth::user()->id;
        $order = order::where('user_id', $userId)->get();

        return view('home.order')->with('order', $order);
    }
    public function edit($id)
    {
        $order = order::where('id', $id)->first();

        return view('order.edit')->with('order', $order);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',

        ], [
            'status.required' => 'status wajib diisi',

        ]);
        $order = [
            'status' => $request->status,

        ];

        order::where('id', $id)->update($order);

        return redirect()->to('orderList')->with('success', 'Berhasil mengubah status');
    }

    public function destroy($id)
    {
        order::where('id', $id)->delete();

        return back()->with('success', 'Berhasil hapus order');
    }


    
    public function admin(Request $Request)
    {

        $order=order::all();
        return view('order.tampil')->with('order', $order);

    }

}
