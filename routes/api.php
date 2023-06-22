<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductApiController;
use App\Http\Controllers\CategoryApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/products', [ProductApiController::class, 'index']);
Route::get('/products/{id}/categories', [ProductApiController::class, 'indexwithcategories']);
Route::get('/products/{id}', [ProductApiController::class, 'getProduct']);

Route::get('/categories', [CategoryApiController::class, 'index']);
Route::get('/categories/{id}/products', [CategoryApiController::class, 'indexwithproducts']);
Route::get('/categories/{id}', [CategoryApiController::class, 'getCategory']);