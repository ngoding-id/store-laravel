<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/categories', [HomeController::class, 'categories'])->name('categories');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'storeUser'])->name('storeUser');
    Route::get('/register-success', [AuthController::class, 'registerSuccess'])->name('registerSuccess');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/dashboard/category', [CategoryController::class, 'index'])->name('dashboard.category');
    Route::get('/dashboard/category/create', [CategoryController::class, 'create'])->name('dashboard.category.create');
    Route::post('/dashboard/category', [CategoryController::class, 'store'])->name('dashboard.category.store');
    Route::get('/dashboard/category/{categoryId}', [CategoryController::class, 'edit'])->name('dashboard.category.edit');
    Route::patch('/dashboard/category/{categoryId}', [CategoryController::class, 'update'])->name('dashboard.category.update');
    Route::delete('/dashboard/category/{categoryId}', [CategoryController::class, 'delete'])->name('dashboard.category.delete');

    Route::prefix('dashboard')->group(function () {
        Route::resource('product', ProductController::class);
    });
});
