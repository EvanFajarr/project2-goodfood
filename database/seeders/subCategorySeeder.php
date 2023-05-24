<?php

namespace Database\Seeders;

use App\Models\subCategory;
use Illuminate\Database\Seeder;

class subCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        subCategory::create([
            'parent_id' => '1',
            'name' => 'makanan kering',
            'code' => 'addjhadhvbacsdakcom',
            'slug' => 'makanan-dingin',
            'status' => 'post',
        ]);
        subCategory::create([
            'parent_id' => '2',
            'name' => 'minuman dingin',
            'code' => 'addjhadhssffsakcom',
            'slug' => 'minuman-dingin',
            'status' => 'post',
        ]);
        subCategory::create([
            'parent_id' => '3',
            'name' => 'keripik',
            'code' => 'addjhadhafffkddddssacom',
            'slug' => 'camilan',
            'status' => 'post',
        ]);
    }
}
