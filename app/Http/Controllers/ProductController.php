<?php

namespace App\Http\Controllers;
use App\Models\image;
use App\Models\product;
use App\Models\subCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $product=product::all();
        return view('product.index')->with('product',$product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = subCategory::all();

        return view('product.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
      

        $product = $req->validate([
            'harga' => 'required|numeric',
            'name' => 'required|unique:product',
            'category_id' => 'required',
            'code'      => 'required|min:3|max:255|unique:product',
            'stok'      => 'required|min:1',
            'slug'          => 'nullable|min:3|max:255|unique:product',
            'discount'          => 'nullable|min:2|max:255',
            'status' => 'required',
        ]);
        // $product = [
        //     'name' => $request->input('name'),
        //     'slug' => $request->input('slug'),
        //     'code' => $request->input('code'),
        //     'status' => $request->input('status'),
        //     'harga' => $request->input('harga'),
        //     'stok' => $request->input('stok'),
        //     'discount' => $request->input('discount'),
        //     'category_id' => $request->input('category_id'),

        // ];
    
        $new_product = product::create($product);
        if($req->has('images')){
            foreach($req->file('images')as $image){
                $imageName = $product['name'].'-image-'.time().rand(1,1000).'.'.$image->extension();
                $image->move(public_path('product_images'),$imageName);
                image::create([
                    'product_id'=>$new_product->id,
                    'image'=>$imageName
                ]);
            }
        //   $harga =(int) $req->harga-($req->harga * $req->discount/100 );
        }
       
        return back()->with('success','Added');
    
}


public function calculateDiscount(Request $request)
{
    $harga = $request->input('harga');
    $discount = $request->input('discount');

    $discountedPrice = $harga - ($harga * ($discount / 100));

    return view('product.index', ['ha$harga' => $harga, 'discount' => $discount, 'discountedPrice' => $discountedPrice]);
}



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = subCategory::all();
        $product = product::where('id', $id)->first();
        return view('product.edit', compact('data', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $product = $request->validate([
            'harga' => 'required|numeric',
            'name' => 'required',
            'category_id' => 'required',
            'stok'      => 'required|min:1',
            'discount'          => 'nullable|min:2|max:255',
            'status' => 'required',
        ] );

        

       


        $new_product = product::where('id', $id)->update($product);

        return redirect('/product')->with('success', 'Berhasil melakukan update data');
          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


     public function images($id){
        $product = product::find($id);
        if(!$product) abort(404);
        $images = $product->image;
        // dd($images);
        return view('image.index',compact('product','images'));
     
    }

    public function destroy($code)
    {

        product::where('code', $code)->delete();
        return redirect('/product')->with('success', 'Berhasil hapus data');
    }

    public function deleteimage($id){
        $image = image::find($id);
        if(!$image) abort(404);
      unlink(public_path('product_images/'.$image->image));
      $image->delete();
      return back()->with('success','delete');
        
   }


public function addimage(Request $req,$id){
        $product = product::find($id);
        if(!$product) abort(404);
        if($req->has('images')){
            foreach($req->file('images')as $image){
                $imageName = $product['name'].'-image-'.time().rand(1,1000).'.'.$image->extension();
                $image->move(public_path('product_images'),$imageName);
                image::create([
                    'product_id'=>$product->id,
                    'image'=>$imageName
                ]);
            }
        }
        return back()->with('success','Added');
}

}


