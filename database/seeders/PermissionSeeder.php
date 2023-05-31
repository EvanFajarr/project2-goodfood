<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'category index']);//category
        Permission::create(['name' => 'category create']);
        Permission::create(['name' => 'category edit']);
        Permission::create(['name' => 'category delete']);
        Permission::create(['name' => 'category export']);
        Permission::create(['name' => 'category import']);

        Permission::create(['name' => 'Subcategory index']);//subcategory
        Permission::create(['name' => 'Subcategory create']);
        Permission::create(['name' => 'Subcategory edit']);
        Permission::create(['name' => 'Subcategory delete']);
        Permission::create(['name' => 'Subcategory export']);
        Permission::create(['name' => 'Subcategory import']);

        Permission::create(['name' => 'product index']);//product
        Permission::create(['name' => 'product create']);
        Permission::create(['name' => 'product edit']);
        Permission::create(['name' => 'product delete']);
        Permission::create(['name' => 'product export']);
        Permission::create(['name' => 'product import']);
        Permission::create(['name' => 'view image']);
        Permission::create(['name' => 'create image']);
        Permission::create(['name' => 'delete image']);

        
        Permission::create(['name' => 'order index']);//order
        Permission::create(['name' => 'order edit']);
        Permission::create(['name' => 'order delete']);
        Permission::create(['name' => 'order export']);


    }
}
