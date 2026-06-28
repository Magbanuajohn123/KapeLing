<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RentController;
/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth:web')->group(function () {
     Route::get('/home', [User::class, 'home'])->name('home.view');
      Route::get('/userRent', [RentController::class, 'itemView'])->name('item.view');
     Route::get('/viewProduct/{id}', [RentController::class, 'productView'])->name('product.view');
});
Route::middleware('auth:admin')->group(function () {
       Route::get('/adminDashboard', [User::class, 'dashboard'])
        ->name('dashboard.view');

    Route::get('/adminCategory', [CategoryController::class, 'category'])
        ->name('category.view');

    Route::get('/adminProduct', [productController::class, 'product'])
        ->name('product.view');

    Route::post('/adminCategory-add', [CategoryController::class, 'addCategory'])
        ->name('category.store');

    Route::post('/adminProduct-add', [ProductController::class, 'addProduct'])
        ->name('product.store');

    Route::delete('/adminCategory-delete/{id}', [CategoryController::class, 'deleteCategory'])
        ->name('category.delete');

     Route::delete('/adminProduct-delete/{id}', [ProductController::class, 'deleteProduct'])
        ->name('product.delete');

    Route::put('/adminCategory-update/{id}', [CategoryController::class, 'updateCategory'])
    ->name('category.update');

    Route::put('/adminProduct-update/{id}', [ProductController::class, 'updateProduct'])
    ->name('product.update');
});
Route::get('/', [User::class, 'register'])->name('register.view');

Route::post('/register', [User::class, 'registerStore'])->name('register.store');

Route::get('/login', [User::class, 'login'])->name('login');

Route::post('/login', [User::class, 'loginProceed'])->name('login.proceed');

    Route::post('/logout', [User::class, 'logout'])->name('logout.proceed');

/*
|--------------------------------------------------------------------------
| AUTHENTICATED USERS (WEB)
|--------------------------------------------------------------------------
*/

// Apply 'auth' middleware to this group to protect routes for logged-in users

