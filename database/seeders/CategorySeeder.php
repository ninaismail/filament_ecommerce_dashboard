<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Category::insert([
            ['name' => 'Womens', 'slug' => 'womens', "image" => "", 'category_code' => 'W', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mens', 'slug' => 'mens', "image" => "", 'category_code' => 'M', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kids', 'slug' => 'kids', "image" => "", 'category_code' => 'K', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Home Goods', 'slug' => 'homegoods', "image" => "", 'category_code' => 'HG', 'created_at' => now(), 'updated_at' => now()],
        ]);    
    }
}
