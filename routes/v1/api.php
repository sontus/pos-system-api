<?php

use App\Http\Controllers\API\v1\ProductController;
use App\Http\Controllers\API\v1\SupplierController;
use Illuminate\Support\Facades\Route;



/**
 * Authentication Routes
 */

Route::as('auth:')->group(
    base_path('routes/v1/auth.php'),
);


//Route::middleware('auth:sanctum')->group(function () {
//

    // Product Routes
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

    // Supplier Routes
    Route::controller(SupplierController::class)->group(function () {
        // List Suppliers
        Route::get('/supplier', 'index');
        // Create Supplier
        Route::post('/supplier', 'store');
        // Update Supplier
        Route::put('supplier/{id}', 'update');
        // Soft Delete Supplier
        Route::delete('supplier/{id}', 'destroy');
    });


//});
