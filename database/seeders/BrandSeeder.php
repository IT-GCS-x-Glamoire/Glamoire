<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brands')->insert([
            [
                'name' => 'Everlaskin',
                'description' => 'Leading innovator in personal computing and mobile devices.',
                'brand_logo' => 'public/images/logo.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tiga Lab',
                'description' => 'Global leader in electronics and mobile technology.',
                'brand_logo' => 'public/images/glamoire.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'MO.RA',
                'description' => 'World-class brand known for high-quality electronics and entertainment.',
                'brand_logo' => 'public/images/vendor-2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'KIMIYU',
                'description' => 'Global leader in sports apparel and footwear.',
                'brand_logo' => 'public/images/vendor-7.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'RoseMary',
                'description' => 'Innovative sportswear and athletic footwear company.',
                'brand_logo' => 'public/images/cat-5.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Raecca',
                'description' => 'Technology company known for software, devices, and cloud services.',
                'brand_logo' => 'public/images/logo.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Orinesia',
                'description' => 'Global leader in internet services and artificial intelligence.',
                'brand_logo' => 'public/images/glamoire.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'day2nite',
                'description' => 'Internationally recognized beverage company.',
                'brand_logo' => 'public/images/vendor-2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Allonic',
                'description' => 'Global beverage and snack company known for innovative branding.',
                'brand_logo' => 'public/images/vendor-7.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Escalade',
                'description' => 'Pioneers in electric vehicles and clean energy solutions.',
                'brand_logo' => 'public/images/cat-5.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Muldream',
                'description' => 'Pioneers in electric vehicles and clean energy solutions.',
                'brand_logo' => 'public/images/cat-5.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Heirloom',
                'description' => 'Pioneers in electric vehicles and clean energy solutions.',
                'brand_logo' => 'public/images/cat-5.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'hairen',
                'description' => 'Pioneers in electric vehicles and clean energy solutions.',
                'brand_logo' => 'public/images/cat-5.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Svah Keina Beauty',
                'description' => 'Pioneers in electric vehicles and clean energy solutions.',
                'brand_logo' => 'public/images/cat-5.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Asiera & CO',
                'description' => 'Pioneers in electric vehicles and clean energy solutions.',
                'brand_logo' => 'public/images/cat-5.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Eucalie',
                'description' => 'Pioneers in electric vehicles and clean energy solutions.',
                'brand_logo' => 'public/images/cat-5.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],           
        ]);
    }
}
