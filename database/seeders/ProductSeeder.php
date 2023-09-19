<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    // WOMENS
    for ($i = 1; $i <= 4; $i++) {
        $category = Category::find(1);
        Product::create([
            'name' => json_encode([
                'en' => 'Women ' . $i,
                'ar' => 'نسائي ' . $i,
            ]),
            'slug' => 'women-' . $i,
            'details' => json_encode([
                'en' => 'Women\'s hoodie',
                'ar' => 'هودي نسائي',
            ]),
            'description' => json_encode([
                'en' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'ar' => 'لوريم ' . $i . ' ابسوم دولور سيت اميت، كونسيكتيتور أديبيسينغ إليت. إبسوم تيمبوريبوس إيوستو إبسا، أسبيريوريس فولوبتاس أوندي أسبيرناتور برايسنتيوم إن؟ أليكوام، دولور!',
            ]),
            'main_image' => 'images/products/main_image/womens-' . $i . '.png',
            'product_code' => $category->category_code . '-00' . $i,
            'price' => rand(999, 9999),
            'quantity' => rand(1, 10),
        ])->categories()->attach($category);
    }

    // MENS
    for ($i = 1; $i <= 4; $i++) {
        $category = Category::find(2);
        Product::create([
            'name' => json_encode([
                'en' => 'Men ' . $i,
                'ar' => 'رجالي ' . $i,
            ]),
            'slug' => 'mens-' . $i,
            'details' => json_encode([
                'en' => 'Men\'s hoodie',
                'ar' => 'هودي رجالي',
            ]),
            'description' => json_encode([
                'en' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'ar' => 'لوريم ' . $i . ' ابسوم دولور سيت اميت، كونسيكتيتور أديبيسينغ إليت. إبسوم تيمبوريبوس إيوستو إبسا، أسبيريوريس فولوبتاس أوندي أسبيرناتور برايسنتيوم إن؟ أليكوام، دولور!',
            ]),
            'main_image' => 'images/products/main_image/mens-' . $i . '.png',
            'product_code' => $category->category_code . '-00' . $i,
            'price' => rand(999, 9999),
            'quantity' => rand(1, 10),
        ])->categories()->attach($category);
    }

    // Kids
    for ($i = 1; $i <= 4; $i++) {
        $category = Category::find(3);
        Product::create([
            'name' => json_encode([
                'en' => 'Kids ' . $i,
                'ar' => 'أطفال ' . $i,
            ]),
            'slug' => 'kids-' . $i,
            'details' => json_encode([
                'en' => 'Kid\'s hoodie',
                'ar' => 'هودي أطفال',
            ]),
            'description' => json_encode([
                'en' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'ar' => 'لوريم ' . $i . ' ابسوم دولور سيت اميت، كونسيكتيتور أديبيسينغ إليت. إبسوم تيمبوريبوس إيوستو إبسا، أسبيريوريس فولوبتاس أوندي أسبيرناتور برايسنتيوم إن؟ أليكوام، دولور!',
            ]),
            'main_image' => 'images/products/main_image/kids-' . $i . '.png',
            'product_code' => $category->category_code . '-00' . $i,
            'price' => rand(999, 9999),
            'quantity' => rand(1, 10),
        ])->categories()->attach($category);
    }

    // HOME GOODS
    for ($i = 1; $i <= 4; $i++) {
        $category = Category::find(4);
        Product::create([
            'name' => json_encode([
                'en' => 'Home Goods ' . $i,
                'ar' => 'منتجات منزلية ' . $i,
            ]),
            'slug' => 'homegoods-' . $i,
            'details' => json_encode([
                'en' => 'Home Goods',
                'ar' => 'منتجات منزلية',
            ]),
            'description' => json_encode([
                'en' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'ar' => 'لوريم ' . $i . ' ابسوم دولور سيت اميت، كونسيكتيتور أديبيسينغ إليت. إبسوم تيمبوريبوس إيوستو إبسا، أسبيريوريس فولوبتاس أوندي أسبيرناتور برايسنتيوم إن؟ أليكوام، دولور!',
            ]),
            'main_image' => 'images/products/main_image/homegoods-' . $i . '.png',
            'alt_images' => [
                'images/products/main_image/womens-1.png',
                'images/products/main_image/homegoods-1.png',
                'images/products/main_image/womens-2.png',
            ],
            'product_code' => $category->category_code . '-00' . $i,
            'price' => rand(999, 9999),
            'quantity' => rand(1, 10),
        ])->categories()->attach($category);
    }    
}
}
   