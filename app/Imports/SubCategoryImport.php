<?php

namespace App\Imports;

use App\Models\subCategory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class SubCategoryImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new subCategory([
            'name'     => $row['name'],
            'code'    => $row['code'], 
            'slug'    => $row['slug'], 
            'status'    => $row['status'] , 
            'parent_id'    => 1 , 
        ]);
    }
}
