<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Aditya',
                'no_hp' => '081234567892',
                'gender' => 'pria',
                'email' => 'adit@gmail.com',
                'password' => bcrypt('123456'),
                'id_role' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Syahrul',
                'no_hp' => '081234567890',
                'gender' => 'pria',
                'email' => 'syahrul@gmail.com',
                'password' => bcrypt('admin'),
                'id_role' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Irvan',
                'no_hp' => '081234567891',
                'gender' => 'pria',
                'email' => 'irvan@gmail.com',
                'password' => bcrypt('irvan'),
                'id_role' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Siti',
                'no_hp' => '081234567892',
                'gender' => 'wanita',
                'email' => 'siti@gmail.com',
                'password' => bcrypt('user'),
                'id_role' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
