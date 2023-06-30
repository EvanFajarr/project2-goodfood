<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\order;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:order index', ['only' => ['order']]);
        $this->middleware('permission:order edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:order delete', ['only' => ['destroy']]);
    }

    // public function index()
    // {
    //     return view('order.index', [

    //         $userId = Auth::user()->id,
    //         'product' => cart::where('user_id', $userId)->get(),
    //     ]);
    // }

    public function index()
    {
        $userId = Auth::user()->id;
        $product = cart::where('user_id', $userId)->where('selected', 1)->get();

        return view('order.index', [
            'product' => $product,
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
                // 'pembayaran' => 'required',
                'code' => 'nullable',

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
            $order->pembayaran = 'cash on delivery';
            $order->code = Str::random(50);
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

    public function admin(Request $request)
    {

        $order = order::query();

        $order->when($request->name, function ($query) use ($request) {
            return $query->where('name', 'like', '%'.$request->name.'%');
        });

        $order->when($request->created_at, function ($query) use ($request) {
            return $query->where('created_at', 'like', '%'.$request->created_at.'%');
        });

        $order->when($request->status, function ($query) use ($request) {
            return $query->whereStatus($request->status);
        });

        return view('order.tampil', ['order' => $order->paginate(10)]);

    }

    public function delete($id)
    {
        order::where('id', $id)->delete();

        return back()->with('success', 'Berhasil hapus order');
    }

    public function editOrder($code)
    {
        $order = order::where('code', $code)->first();

        return view('order.editOrder')->with('order', $order);
    }

    public function updateOrder(Request $request, $code)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no' => 'required',
            'note' => 'nullable',

        ]);
        $order = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no' => $request->no,
            'note' => $request->note,

        ];

        order::where('code', $code)->update($order);

        return redirect()->to('orderUser')->with('success', 'update berhasil');
    }
}
