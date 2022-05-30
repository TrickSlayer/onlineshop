<?php

namespace Database\Seeders;

use App\Models\Category;
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
            ['name' => 'review_product'],
            ['name' => 'update_product'],
            ['name' => 'delete_product'],
            ['name' => 'restore_product'],
            ['name' => 'force_delete_product'],
            ['name' => 'review_category'],
            ['name' => 'update_category'],
            ['name' => 'delete_category'],
            ['name' => 'restore_category'],
            ['name' => 'force_delete_category'],
            ['name' => 'review_group_chat'],
            ['name' => 'update_group_chat'],
            ['name' => 'delete_group_chat'],
            ['name' => 'restore_group_chat'],
            ['name' => 'force_delete_group_chat'],
        ]);

        DB::table('roles')->insert([
            ['name' => 'admin'],
            ['name' => 'user'],
        ]);

        DB::table('role_user')->insert([
            ['role_id' => 1,'user_id' => 1,],
            ['role_id' => 1,'user_id' => 2,],
            ['role_id' => 1,'user_id' => 3,],
        ]);

        DB::table('permission_role')->insert([
            ['permission_id' => 1, 'role_id' => 1],
            ['permission_id' => 2, 'role_id' => 1],
            ['permission_id' => 3, 'role_id' => 1],
            ['permission_id' => 4, 'role_id' => 1],
            ['permission_id' => 5, 'role_id' => 1],
            ['permission_id' => 6, 'role_id' => 1],
            ['permission_id' => 7, 'role_id' => 1],
            ['permission_id' => 8, 'role_id' => 1],
            ['permission_id' => 9, 'role_id' => 1],
            ['permission_id' => 10, 'role_id' => 1],
            ['permission_id' => 11, 'role_id' => 1],
            ['permission_id' => 12, 'role_id' => 1],
            ['permission_id' => 13, 'role_id' => 1],
            ['permission_id' => 14, 'role_id' => 1],
            ['permission_id' => 15, 'role_id' => 1],
        ]);

        DB::table('categories')->insert([
            'name' => 'Phone',
            'description' => 'Mobile phone',
            'content' => 'If you like',
            'active' => 1,
            'thumb' => 'none',
        ]);

        DB::table('products')->insert([
            [
                'category_id' => 1,
                'user_id' => 1,
                'name' => 'Xiaomi',
                'price' => 10.3,
                'sale_price' => 10.3,
                'description' => 'China Phone',
                'content' => 'Flashship',
                'active' => 1,
                'thumb' => 'none',
            ],
            [
                'category_id' => 1,
                'user_id' => 1,
                'name' => 'Redmi',
                'price' => 10.3,
                'sale_price' => 10.3,
                'description' => 'China Phone',
                'content' => 'Flashship 2',
                'active' => 1,
                'thumb' => 'none',
            ],
        ]);

        DB::table('group_chats')->insert([
            ['name' => '1'],
            ['name' => '2'],
            ['name' => '3'],
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
