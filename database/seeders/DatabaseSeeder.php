<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Real
        // DB::table('users')->insert([
        //     [
        //         'name' => 'admin',
        //         'email' => 'admin@gmail.com',
        //         'password' => bcrypt('123456'),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //         'confirmed' => 1
        //     ],
        //     [
        //         'name' => 'user',
        //         'email' => 'user@gmail.com',
        //         'password' => bcrypt('123456'),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //         'confirmed' => 0
        //     ],
        // ]);
        
        // DB::table('permissions')->insert([
        //     ['name' => 'review_product'],
        //     ['name' => 'update_product'],
        //     ['name' => 'delete_product'],
        //     ['name' => 'restore_product'],
        //     ['name' => 'force_delete_product'],
        // ]);
        //
        // DB::table('roles')->insert([
        //     ['name' => 'admin'],
        //     ['name' => 'user'],
        // ]);
        //
        // DB::table('role_user')->insert([
        //     'role_id' => 1,
        //     'user_id' => 1,
        // ]);
        //
        // DB::table('permission_role')->insert([
        //     ['permission_id' => 1, 'role_id' => 1],
        //     ['permission_id' => 2, 'role_id' => 1],
        //     ['permission_id' => 3, 'role_id' => 1],
        //     ['permission_id' => 4, 'role_id' => 1],
        //     ['permission_id' => 5, 'role_id' => 1],
        // ]);
    }
}
