<?php

namespace Database\Seeders;

use App\Models\admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $role = Role::create([
        //     'name' => 'admin',
        //     'guard_name' => 'admin',
        // ]);

        $user = admin::create([
            'name' => 'admin1',
            'email' => 'admin1@gmail.com',
            // 'alamat' => 'Panggungharjo,Sewon,Bantul',
            // 'no' => '0896789936333',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),

        ]);
        $user->assignRole('1');
    }
}
