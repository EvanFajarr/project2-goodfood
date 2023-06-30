<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\subCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['verified'])->only('index');
    // }
    public function index(Request $request)
    {

        $product = product::query();

        $product->when($request->name, function ($query) use ($request) {
            return $query->where('name', 'like', '%'.$request->name.'%');
        });

        $product->when($request->created_at, function ($query) use ($request) {
            return $query->where('created_at', 'like', '%'.$request->created_at.'%');
        });

        $product->when($request->harga, function ($query) use ($request) {
            return $query->where('harga', 'like', '%'.$request->harga.'%');
        });

        $product->when($request->category_id, function ($query) use ($request) {
            return $query->whereCategory_id($request->category_id);
        });
        $data = subCategory::all();

        return view('home.index', compact('data'), ['product' => $product->paginate(10)]);

    }

    public function detail($slug)
    {
        // $product = product::find($slug);
        $product = product::where('slug', $slug)->first();
        if (! $product) {
            abort(404);
        }
        $images = $product->image;

        return view('detail.index', compact('product', 'images'));

    }
}
