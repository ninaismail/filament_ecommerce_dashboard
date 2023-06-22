<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryApiController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::all());
    }
    public function indexwithproducts($id)
    {
        // Assuming you have a BelongsToMany relationship called 'products' on the Category model
        $category = Category::find($id);  // Replace 1 with the actual ID of the category
        $products = $category->products()->get();

        $response = new Response();
        $response->setContent($products);

        return $response;
    }
    public function getCategory($id)
    {
        $category = Category::find($id);
        return $category;
    }  
}
