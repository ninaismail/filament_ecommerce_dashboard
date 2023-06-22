<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Symfony\Component\HttpFoundation\Response;

class ProductApiController extends Controller
{
    public function index()
    {
        return ProductResource::collection(Product::all());
    }
    public function indexwithcategories($id)
    {
        // Assuming you have a BelongsToMany relationship called 'categories' on the Product model
        $product = Product::find($id);  // Replace 1 with the actual ID of the product
        $categories = $product->categories()->get();

        $response = new Response();
        $response->setContent($categories);

        return $response;
    }
    public function getProduct($id)
    {
        $product = Product::find($id);
        return $product;
    }  
}