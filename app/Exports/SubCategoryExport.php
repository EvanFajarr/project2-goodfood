<?php

namespace App\Exports;

use App\Models\subCategory;
use Maatwebsite\Excel\Concerns\FromCollection;

class SubCategoryExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return subCategory::all();
    }
}
