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
        for ($i=1; $i <= 4; $i++) {
            $category = Category::find(1);
            Product::create([
                'name' => 'Womens '.$i,
                'slug' => 'women-'.$i,
                'details' => 'women\'s hoodie',
                'description' =>'Lorem '. $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'main_image' => 'images/products/main_image/womens-'.$i.'.png',
                'product_code' => $category->category_code.'-00'.$i,
                'price' => rand(999, 9999),
                'quantity' => rand(1,10),
            ])->categories()->attach($category);
        }

        // MENS
        for ($i=1; $i <= 4; $i++) {
            $category = Category::find(2);
            Product::create([
                'name' => 'Mens '.$i,
                'slug' => 'mens-'.$i,
                'details' => 'men\'s hoodie',
                'description' =>'Lorem '. $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'main_image' => 'images/products/main_image/mens-'.$i.'.png',
                'product_code' => $category->category_code.'-00'.$i,
                'price' => rand(999, 9999),
                'quantity' => rand(1,10),
            ])->categories()->attach($category);
        }

        // Kids
        for ($i=1; $i <= 4; $i++) {
            $category = Category::find(3);
            Product::create([
                'name' => 'Kids '.$i,
                'slug' => 'kids-'.$i,
                'details' => 'kid\'s hoodie',
                'description' =>'Lorem '. $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'main_image' => 'images/products/main_image/kids-'.$i.'.png',
                'product_code' => $category->category_code.'-00'.$i,
                'price' => rand(999, 9999),
                'quantity' => rand(1,10),
            ])->categories()->attach($category);
        }

        // HOME GOODS
        for ($i=1; $i <= 4; $i++) {
            $category = Category::find(4);
            Product::create([
                'name' => 'Home Goods '.$i,
                'slug' => 'homegoods-'.$i,
                'details' => 'homegoods',
                'description' =>'Lorem '. $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'main_image' => 'images/products/main_image/homegoods-'.$i.'.png',
                'product_code' => $category->category_code.'-00'.$i,
                'price' => rand(999, 9999),
                'quantity' => rand(1,10),
            ])->categories()->attach($category);
        }    
        $product = Product::find(290);
        $product->update([
            'alt_images' => [
                'images/products/main_image/womens-1.png',
                'images/products/main_image/homegoods-1.png',
                'images/products/main_image/womens-2.png',
                'images/products/main_image/homegoods-2.png',
                'images/products/main_image/womens-3.png',
                'images/products/main_image/homegoods-3.png',
                'images/products/main_image/womens-4.png',
                'images/products/main_image/homegoods-4.png',
            ]
        ]);
        $product->categories()->attach(4); 
    }
}
