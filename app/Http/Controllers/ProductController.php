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

     public function __construct()
     {
         $this->middleware('permission:product index', ['only' => ['index']]);
         $this->middleware('permission:product create', ['only' => ['create', 'store']]);
         $this->middleware('permission:product edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:product delete', ['only' => ['destroy']]);
         $this->middleware('permission:view image', ['only' => ['images']]);
         $this->middleware('permission:create image', ['only' => ['addimage']]);
         $this->middleware('permission:delete image', ['only' => ['deleteimage']]);
     }
 

    public function index(Request $request)
    {
        $product = product::query();

        
        $product->when($request->name, function ($query) use ($request) {
            return $query->where('name', 'like', '%'.$request->name.'%');
        });

        $product->when($request->stok, function ($query) use ($request) {
            return $query->where('stok', 'like', '%'.$request->stok.'%');
        });

        $product->when($request->created_at, function ($query) use ($request) {
            return $query->where('created_at', 'like', '%'.$request->created_at.'%');
        });
       

       
        $product->when($request->status, function ($query) use ($request) {
            return $query->whereStatus($request->status);
        });
        
        return view('product.index', ['product' => $product->paginate(10)]);


     
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

        // $product = new product;
        // $product->name = $req['name'];
        // $product->slug = $req['slug'];
        // $product->code = $req['code'];
        // $product->harga = $req['harga'];
        // $product->status =  $req['status'];
        // $product->stok = $req['stok'];
        // $product->discount = $req['discount'];
        // $product->category_id = $req['category_id'];
      
        $new_product = product::create($product);
        // $discount = $new_product->discount;
        // $discountedPrice =(int)$new_product->harga - ((int)$discount / 100 * (int)$new_product->harga) ;

        if($req->has('images')){
            foreach($req->file('images')as $image){
                $imageName = $product['name'].'-image-'.time().rand(1,1000).'.'.$image->extension();
                $image->move(public_path('product_images'),$imageName);
                image::create([
                    'product_id'=>$new_product->id,
                    'image'=>$imageName
                ]);
            }
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


