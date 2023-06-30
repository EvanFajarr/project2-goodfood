<?php

namespace App\Imports;

use App\Models\category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

// use Illuminate\Support\Facades\DB;
class CategoryImport implements ToModel, WithHeadingRow
{
    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new category([
            'name' => $row['name'],
            'code' => $row['code'],
            'slug' => $row['slug'],
            'status' => $row['status'],

        ]);
    }
}
