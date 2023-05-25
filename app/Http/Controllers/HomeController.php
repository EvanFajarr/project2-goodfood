<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $product=product::all();
        return view('home.index')->with('product',$product);
    }


    public function detail($id){
        $product = product::find($id);
        $discount = $product->discount;
        $discountedPrice =(int)$product->harga - ((int)$discount / 100 * (int)$product->harga) ;
        if(!$product) abort(404);
        $images = $product->image;
     
        return view('detail.index',compact('product','images','discountedPrice'));
     
    }
}
