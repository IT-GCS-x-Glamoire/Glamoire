<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => Str::uuid(), // Generate UUID
                'name' => 'superadmin',
                'email' => 'superadmin@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'), // Password is hashed
                'role' => 'superadmin',
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(), // Generate UUID
                'name' => 'admin',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'), // Password is hashed
                'role' => 'admin',
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more users if needed
            [
                'id' => Str::uuid(), // Generate UUID
                'name' => 'accounting',
                'email' => 'accounting@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'), // Password is hashed
                'role' => 'accounting',
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(), // Generate UUID
                'name' => 'admingudang',
                'email' => 'user@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'), // Password is hashed
                'role' => 'gudang',
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
