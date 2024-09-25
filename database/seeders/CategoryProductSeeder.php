<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category_products')->insert([
            ['name' => 'Makeup', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Skincare', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Haircare', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Gift Set', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bath Body', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Accessories', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Fragrance', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Men', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Home Care', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Oral Care', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sanitary', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Shaving & Grooming', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Nail Care', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
