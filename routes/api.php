<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');


/**
 * Version 1
 */
Route::prefix('v1')->as('v1:')->group(
    base_path('routes/v1/api.php'),
);
