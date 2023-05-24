<?php

namespace App\Imports;

use App\Models\product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new product([
            'name'     => $row['name'],
            'stok'     => $row['stok'],
            'code'    => $row['code'], 
            'slug'    => $row['slug'], 
            'status'    => $row['status'] , 
            'discount'    => $row['discount']  , 
            'category_id' => $row['category_id'],
            'harga' => $row['harga'],
        ]);
    }
}
