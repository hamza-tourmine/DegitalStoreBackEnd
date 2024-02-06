<?php

use App\Http\Controllers\productController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Products
Route::get('/products', [ProductController::class, 'index']); // GET all products
Route::post('/products',[productController::class ,'create']);
Route::delete('/products/{id}',[productController::class ,'delete']);
Route::get('/products/{id}', [ProductController::class, 'show']); // GET a specific product by ID
Route::put('/products/{id}', [ProductController::class, 'update']); // Update a specific product by ID
// Custommers


