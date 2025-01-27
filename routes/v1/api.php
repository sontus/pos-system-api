<?php

use App\Http\Controllers\API\v1\ProductController;
use Illuminate\Support\Facades\Route;



/**
 * Authentication Routes
 */

Route::as('auth:')->group(
    base_path('routes/v1/auth.php'),
);


//Route::middleware('auth:sanctum')->group(function () {
//
Route::controller(ProductController::class)->group(function () {

    // List Products
    Route::get('/products', 'index');

    // Create Product
    Route::post('/products', 'store');

    // Update Product
    Route::put('products/{id}', 'update');

    // Soft Delete Product
    Route::delete('products/{id}', 'destroy');
});
//});
