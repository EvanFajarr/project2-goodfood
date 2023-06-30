<?php

namespace App\Http\Controllers;

use App\Exports\CategoryExport;
use App\Exports\OrderExport;
use App\Exports\ProductExport;
use App\Exports\SubCategoryExport;
use App\Imports\CategoryImport;
use App\Imports\ProductImport;
use App\Imports\SubCategoryImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CsvController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:category export', ['only' => ['export']]);
        $this->middleware('permission:category import', ['only' => ['import']]);
        $this->middleware('permission:Subcategory export', ['only' => ['subCategoryexport']]);
        $this->middleware('permission:Subcategory import', ['only' => ['subCategoryimport']]);
        $this->middleware('permission:product export', ['only' => ['productexport']]);
        $this->middleware('permission:product import', ['only' => ['productimport']]);
        $this->middleware('permission:order export', ['only' => ['orderexport']]);
    }

    public function export()
    {
        return Excel::download(new CategoryExport, 'category.csv');
    }

    public function import(Request $request)
    {
        Excel::import(new CategoryImport, $request->file);

        return back()->with('success', 'Category Imported Successfully');
    }

    public function subCategoryexport()
    {
        return Excel::download(new SubCategoryExport, 'subCategory.csv');
    }

    public function subCategoryimport(Request $request)
    {
        Excel::import(new SubCategoryImport, $request->file);

        return back()->with('success', 'Subcategory Imported Successfully');
    }

    public function productexport()
    {
        return Excel::download(new ProductExport, 'product.csv');
    }

    public function productimport(Request $request)
    {
        Excel::import(new ProductImport, $request->file);

        return back()->with('success', 'Product Imported Successfully');
    }

    public function orderexport()
    {
        return Excel::download(new OrderExport, 'order.csv');
    }
}
