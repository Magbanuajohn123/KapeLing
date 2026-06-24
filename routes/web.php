<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [User::class, 'register'])->name('register.view');

Route::post('/register', [User::class, 'registerStore'])->name('register.store');

Route::get('/login', [User::class, 'login'])->name('login');

Route::post('/login', [User::class, 'loginProceed'])->name('login.proceed');


/*
|--------------------------------------------------------------------------
| AUTHENTICATED USERS (WEB)
|--------------------------------------------------------------------------
*/

Route::middleware('auth:web')->group(function () {

    Route::get('/home', [User::class, 'home'])->name('home.view');

    Route::post('/logout', [User::class, 'logout'])->name('logout.proceed');

});


/*
|--------------------------------------------------------------------------
| ADMIN ONLY ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth:admin')->group(function () {

    Route::get('/adminDashboard', [User::class, 'dashboard'])
        ->name('dashboard.view');

    Route::get('/adminCategory', [CategoryController::class, 'category'])
        ->name('category.view');

    Route::post('/adminCategory-add', [CategoryController::class, 'addCategory'])
        ->name('category.store');

    Route::delete('/adminCategory-delete/{id}', [CategoryController::class, 'deleteCategory'])
        ->name('category.delete');

});
