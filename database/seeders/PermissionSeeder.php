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
        Permission::create(['name' => 'category index', 'guard_name' => 'admin']);//category
        Permission::create(['name' => 'category create', 'guard_name' => 'admin']);
        Permission::create(['name' => 'category edit', 'guard_name' => 'admin']);
        Permission::create(['name' => 'category delete', 'guard_name' => 'admin']);
        Permission::create(['name' => 'category export', 'guard_name' => 'admin']);
        Permission::create(['name' => 'category import', 'guard_name' => 'admin']);

        Permission::create(['name' => 'Subcategory index', 'guard_name' => 'admin']);//subcategory
        Permission::create(['name' => 'Subcategory create', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Subcategory edit', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Subcategory delete', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Subcategory export', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Subcategory import', 'guard_name' => 'admin']);

        Permission::create(['name' => 'product index', 'guard_name' => 'admin']);//product
        Permission::create(['name' => 'product create', 'guard_name' => 'admin']);
        Permission::create(['name' => 'product edit', 'guard_name' => 'admin']);
        Permission::create(['name' => 'product delete', 'guard_name' => 'admin']);
        Permission::create(['name' => 'product export', 'guard_name' => 'admin']);
        Permission::create(['name' => 'product import', 'guard_name' => 'admin']);
        Permission::create(['name' => 'view image', 'guard_name' => 'admin']);
        Permission::create(['name' => 'create image', 'guard_name' => 'admin']);
        Permission::create(['name' => 'delete image', 'guard_name' => 'admin']);

        
        Permission::create(['name' => 'order index', 'guard_name' => 'admin']);//order
        Permission::create(['name' => 'order edit', 'guard_name' => 'admin']);
        Permission::create(['name' => 'order delete', 'guard_name' => 'admin']);
        Permission::create(['name' => 'order export', 'guard_name' => 'admin']);


    }
}
