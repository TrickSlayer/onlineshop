<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Shop;
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
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'created_at' => now(),
                'updated_at' => now(),
                'confirmed' => 1
            ],
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => bcrypt('123456'),
                'created_at' => now(),
                'updated_at' => now(),
                'confirmed' => 1
            ],
            [
                'name' => 'user1',
                'email' => 'user1@gmail.com',
                'password' => bcrypt('123456'),
                'created_at' => now(),
                'updated_at' => now(),
                'confirmed' => 1
            ],
        ]);

        DB::table('permissions')->insert([
            ['name' => 'create_category'],
            ['name' => 'review_category'],
            ['name' => 'update_category'],
            ['name' => 'delete_category'],

            ['name' => 'create_product'],
            ['name' => 'review_product'],
            ['name' => 'update_product'],
            ['name' => 'delete_product'],
            ['name' => 'force_delete_product'],
            ['name' => 'restore_product'],

            ['name' => 'create_shop'],
            ['name' => 'review_shop'],
            ['name' => 'update_shop'],
            ['name' => 'delete_shop'],
            ['name' => 'force_delete_shop'],
            ['name' => 'restore_shop'],

            ['name' => 'create_group_chat'],
            ['name' => 'review_group_chat'],
            ['name' => 'update_group_chat'],
            ['name' => 'delete_group_chat'],
        ]);

        DB::table('roles')->insert([
            ['name' => 'admin'],
            ['name' => 'shop'],
            ['name' => 'user'],
        ]);

        DB::table('permission_role')->insert([

            // Category
            ['permission_id' => 1, 'role_id' => 1],
            ['permission_id' => 2, 'role_id' => 1],
            ['permission_id' => 3, 'role_id' => 1],
            ['permission_id' => 4, 'role_id' => 1],

            // Product
            ['permission_id' => 5, 'role_id' => 2],
            ['permission_id' => 6, 'role_id' => 2],
            ['permission_id' => 6, 'role_id' => 1],
            ['permission_id' => 7, 'role_id' => 2],
            ['permission_id' => 8, 'role_id' => 2],
            ['permission_id' => 9, 'role_id' => 1],
            ['permission_id' => 10, 'role_id' => 1],

            // Shop
            ['permission_id' => 11, 'role_id' => 3],
            ['permission_id' => 12, 'role_id' => 2],
            ['permission_id' => 12, 'role_id' => 3],
            ['permission_id' => 13, 'role_id' => 2],
            ['permission_id' => 14, 'role_id' => 2],
            ['permission_id' => 15, 'role_id' => 1],
            ['permission_id' => 16, 'role_id' => 1],
        ]);

        DB::table('role_user')->insert([
            ['role_id' => 1, 'user_id' => 1,],
            ['role_id' => 2, 'user_id' => 1,],
            ['role_id' => 3, 'user_id' => 1,],
            ['role_id' => 2, 'user_id' => 2,],
            ['role_id' => 3, 'user_id' => 2,],
            ['role_id' => 2, 'user_id' => 3,],
            ['role_id' => 3, 'user_id' => 3,],
        ]);

        Category::factory()->count(10)->create();

        Shop::factory()->count(3)->create();

        Product::factory()->count(500)->create();

       // Comment::factory()->count(1000)->create();

        DB::table('group_chats')->insert([
            [
                'name' => 'Name AS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Aiuhih',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ioaisod',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('group_chat_user')->insert([
            ['user_id' => 1, 'group_chat_id' => 1],
            ['user_id' => 2, 'group_chat_id' => 1],
            ['user_id' => 1, 'group_chat_id' => 2],
            ['user_id' => 3, 'group_chat_id' => 2],
            ['user_id' => 1, 'group_chat_id' => 3],
        ]);
    }
}
