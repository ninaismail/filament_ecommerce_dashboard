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
        $categoriesData = [
            [
                'name' => json_encode(['en' => 'Womens', 'ar' => 'نسائي']),
                'slug' => 'womens',
                'image' => '',
                'category_code' => 'W',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode(['en' => 'Mens', 'ar' => 'رجالي']),
                'slug' => 'mens',
                'image' => '',
                'category_code' => 'M',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode(['en' => 'Kids', 'ar' => 'أطفال']),
                'slug' => 'kids',
                'image' => '',
                'category_code' => 'K',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode(['en' => 'Home Goods', 'ar' => 'منتجات منزلية']),
                'slug' => 'homegoods',
                'image' => '',
                'category_code' => 'HG',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        
        Category::insert($categoriesData);
         
    }
}
