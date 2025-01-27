<?php

use Illuminate\Support\Facades\Route;



/**
 * Authentication Routes
 */

Route::as('auth:')->group(
    base_path('routes/v1/auth.php'),
);


Route::middleware('auth:sanctum')->group(function () {

});
