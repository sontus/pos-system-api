<?php


use App\Http\Controllers\API\v1\Auth\LoginController;
use App\Http\Controllers\API\v1\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group( function () {

    // Register
    Route::post('register', [RegisterController::class, 'register'])
        ->name('register');

    // Login
    Route::post('login', [LoginController::class, 'login'])
        ->middleware('guest:sanctum')
        ->name('login');

    // Unauthorized
    Route::get('unauthorized', [LoginController::class, 'unauthorized'])
        ->name('unauthorized');
    // Logout
    Route::post('logout', [LoginController::class, 'logout'])
        ->middleware('auth:sanctum')
        ->name('logout');
});
