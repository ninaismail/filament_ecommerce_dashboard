<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;

class ProductApiController extends Controller
{
    public function index()
    {
        return ProductResource::collection(Product::all());
    }
    public function indexwithcategories(Category $category)
    {
    return response()->json($category->products()->with("type")->get());
    }
}