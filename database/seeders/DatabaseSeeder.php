<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
        PermissionSeeder::class,
    ]);

    
    $this->call([
        RolleSeeder::class,
    ]);

        $this->call([
                CategorySeeder::class,
        ]);
        $this->call([
            subCategorySeeder::class,
        ]);
        $this->call([
            UserTableSeeder::class,
        ]);
    
    }
}
