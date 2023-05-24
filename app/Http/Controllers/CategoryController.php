<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $category= category::orderBy ('id','desc')->get();
        return view('category.index')->with('category',$category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create', [
            'title' => 'Tambah category',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Session::flash('name', $request->name);
        Session::flash('code', $request->code);
        Session::flash('slug', $request->slug);
        Session::flash('status', $request->status);

        $request->validate([
            'name'      => 'required|min:3|max:255|string|unique:category',
            'code'      => 'required|min:3|max:255|unique:category',
            'slug'          => 'nullable|min:3|max:255|unique:category',
            'status' => 'required'
      ]);



    $category = [
        'name' => $request->input('name'),
        'slug' => $request->input('slug'),
        'code' => $request->input('code'),
        'status' => $request->input('status'),
    ];

      category::create($category);
      return redirect('/category')->withSuccess('You have successfully created a Category!');
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
    public function edit($code)
    {
        
        $category = category::where('code', $code)->first();

        return view('category.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $code)
    {
        Session::flash('name', $request->name);
        Session::flash('slug', $request->slug);
        Session::flash('status', $request->status);

        $request->validate([
            'name'      => 'required|min:3|max:255|string',
            'slug'          => 'nullable|min:3|max:255',
            'status' => 'required'
        ], );

        $category = [
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'status' => $request->input('status'),

        ];
        category::where('code', $code)->update($category);

        return redirect('/category')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($code)
    {
        category::where('code', $code)->delete();

        return redirect('/category')->with('success', 'Berhasil hapus data');
    }

    public function slug(Request $request){
        $slug = SlugService::createSlug(category::class, 'slug', $request->name );
        return response()->json(['slug' => $slug]);
    }
}
