<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;

Route::get('/', [User::class, 'register'])->name('register.view');
Route::post('/register', [User::class, 'registerStore'])->name('register.store');
Route::get('/login', [User::class, 'login'])->name('login.view');
Route::post('/login', [User::class, 'loginProceed'])->name('login.proceed');
Route::get('/home', [User::class, 'home'])->name('home.view');
Route::get('/adminDashboard', [User::class, 'dashboard'])->name('dashboard.view');
