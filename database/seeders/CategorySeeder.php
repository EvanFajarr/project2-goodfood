<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        category::create([
            'name' => 'makanan',
            'code' => 'addjhadhakcom',
            'slug' => 'makanan',
            'status' => 'post',
        ]);
        category::create([
            'name' => 'minuman',
            'code' => 'addjhadhsssakcom',
            'slug' => 'minuman',
            'status' => 'post',
        ]);
        category::create([
            'name' => 'camilan',
            'code' => 'addjhadhakddddssacom',
            'slug' => 'camilan',
            'status' => 'post',
        ]);
    }
}
