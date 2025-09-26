<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin123'),
                'phone' => '081234567890',
                'join_date' => now(),
                'email_verified_at' => now(),
            ],
            // [
            //     'name' => 'Budi Santoso',
            //     'email' => 'budi@example.com',
            //     'password' => Hash::make('password123'),
            //     'phone' => '081234567891',
            //     'join_date' => now(),
            //     'email_verified_at' => now(),
            // ],
            // [
            //     'name' => 'Charlie Wijaya',
            //     'email' => 'charlie@example.com',
            //     'password' => Hash::make('password123'),
            //     'phone' => '081234567892',
            //     'join_date' => now(),
            //     'email_verified_at' => now(),
            // ],
            // [
            //     'name' => 'Denny Kurniawan',
            //     'email' => 'denny@example.com',
            //     'password' => Hash::make('password123'),
            //     'phone' => '081234567893',
            //     'join_date' => now(),
            //     'email_verified_at' => now(),
            // ],
            // [
            //     'name' => 'Eko Prasetyo',
            //     'email' => 'eko@example.com',
            //     'password' => Hash::make('password123'),
            //     'phone' => '081234567894',
            //     'join_date' => now(),
            //     'email_verified_at' => now(),
            // ],
            // [
            //     'name' => 'Fajar Ramadhan',
            //     'email' => 'fajar@example.com',
            //     'password' => Hash::make('password123'),
            //     'phone' => '081234567895',
            //     'join_date' => now(),
            //     'email_verified_at' => now(),
            // ],
            // [
            //     'name' => 'Gilang Dirga',
            //     'email' => 'gilang@example.com',
            //     'password' => Hash::make('password123'),
            //     'phone' => '081234567896',
            //     'join_date' => now(),
            //     'email_verified_at' => now(),
            // ],
            // [
            //     'name' => 'Hendra Setiawan',
            //     'email' => 'hendra@example.com',
            //     'password' => Hash::make('password123'),
            //     'phone' => '081234567897',
            //     'join_date' => now(),
            //     'email_verified_at' => now(),
            // ],
            // [
            //     'name' => 'Irfan Bachdim',
            //     'email' => 'irfan@example.com',
            //     'password' => Hash::make('password123'),
            //     'phone' => '081234567898',
            //     'join_date' => now(),
            //     'email_verified_at' => now(),
            // ],
            // [
            //     'name' => 'Joko Susilo',
            //     'email' => 'joko@example.com',
            //     'password' => Hash::make('password123'),
            //     'phone' => '081234567899',
            //     'join_date' => now(),
            //     'email_verified_at' => now(),
            // ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
