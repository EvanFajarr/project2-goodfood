<?php
namespace App\Http\Controllers;

use App\Exports\OrderExport;
use Illuminate\Http\Request;
use App\Exports\ProductExport;
use App\Imports\ProductImport;
use App\Exports\CategoryExport;
use App\Imports\CategoryImport;
use App\Exports\SubCategoryExport;
use App\Imports\SubCategoryImport;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class CsvController extends Controller
{



    // public function importExportView()
    // {
    //    return view('category.export');
    // }
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
