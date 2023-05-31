<?php

namespace App\Http\Controllers;
use App\Models\category;
use Illuminate\Support\Str;
use App\Models\subCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Cviebrock\EloquentSluggable\Services\SlugService;

class SubCategoryController extends Controller
{


    public function __construct()
    {
        $this->middleware('permission:Subcategory index', ['only' => ['index']]);
        $this->middleware('permission:Subcategory create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Subcategory edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Subcategory delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
     {

    $subCategory = subCategory::query();

        
        $subCategory->when($request->name, function ($query) use ($request) {
            return $query->where('name', 'like', '%'.$request->name.'%');
        });

        $subCategory->when($request->created_at, function ($query) use ($request) {
            return $query->where('created_at', 'like', '%'.$request->created_at.'%');
        });
       

       
        $subCategory->when($request->status, function ($query) use ($request) {
            return $query->whereStatus($request->status);
        });
        
        return view('subCategory.index', ['subCategory' => $subCategory->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = category::all();

        return view('subCategory.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('parent_id', $request->parent_id);
        Session::flash('name', $request->name);
        Session::flash('code', $request->code);
        Session::flash('slug', $request->slug);
        Session::flash('status', $request->status);

        $request->validate([
            'name'      => 'required|min:3|max:255|string|unique:sub_category',
            'code'      => 'required|min:3|max:255|unique:sub_category',
            'slug'          => 'nullable|min:3|max:255|unique:sub_category',
            'status' => 'required',
            'parent_id' => 'required'
      ]);



    $subCategory = [
        'name' => $request->input('name'),
        'slug' => $request->input('slug'),
        'code' => $request->input('code'),
        'status' => $request->input('status'),
        'parent_id' => $request->input('parent_id'),
    ];

      subCategory::create($subCategory);
      return redirect('/Subcategory')->withSuccess('You have successfully created a SubCategory!');
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
        $category = category::all();
        $subCategory = subCategory::where('code', $code)->first();

        return view('subCategory.edit', compact('subCategory', 'category'));
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
        Session::flash('parent_id', $request->parent_id);
        Session::flash('name', $request->name);
        Session::flash('slug', $request->slug);
        Session::flash('status', $request->status);

        $request->validate([
            'name'      => 'required|min:3|max:255|string',
            'slug'          => 'nullable|min:3|max:255',
            'status' => 'required',
            'parent_id' => 'required'
        ], );

        $subCategory = [
            'name' => $request->input('name'),
            'parent_id' => $request->input('parent_id'),
            'slug' => $request->input('slug'),
            'status' => $request->input('status'),

        ];
        subCategory::where('code', $code)->update($subCategory);

        return redirect('/Subcategory')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($code)
    {
        subCategory::where('code', $code)->delete();

        return redirect('/Subcategory')->with('success', 'Berhasil hapus data');
    }
}
