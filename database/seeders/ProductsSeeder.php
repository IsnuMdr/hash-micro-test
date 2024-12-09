<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Macbook Pro M1',
                'price' => 13500000,
                'category_id' => 1,
                'quantity' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Iphone 13 Pro',
                'price' => 25000000,
                'category_id' => 1,
                'quantity' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Kemeja',
                'price' => 200000,
                'category_id' => 2,
                'quantity' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Sepatu',
                'price' => 500000,
                'category_id' => 2,
                'quantity' => 20,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Panci',
                'price' => 100000,
                'category_id' => 3,
                'quantity' => 30,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Buku',
                'price' => 50000,
                'category_id' => 3,
                'quantity' => 40,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
