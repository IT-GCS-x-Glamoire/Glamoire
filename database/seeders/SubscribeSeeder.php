<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscribeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample email data
        $emails = [
            'alice@example.com',
            'bob@example.com',
            'charlie@example.com',
            'david@example.com',
            'eve@example.com',
            'frank@example.com',
            'grace@example.com',
            'hank@example.com',
            'irene@example.com',
            'jack@example.com',
        ];

        foreach ($emails as $email) {
            DB::table('subscribe')->insert([
                'email' => $email,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
