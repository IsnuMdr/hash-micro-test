<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckPercentageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->to('/login');
});

Route::get('dashboard', function () {
    return redirect()->to('products');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::get('create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/', [ProductController::class, 'store'])->name('products.store');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('update/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    });

    Route::get('product-values', [CategoryController::class, 'productValues'])->name('products.values');

    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('update/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    });

    Route::get('check-percentage', [CheckPercentageController::class, 'index'])->name('check-percentage.index');
    Route::post('check-percentage', [CheckPercentageController::class, 'calculate'])->name('check-percentage.calculate');
});

require __DIR__ . '/auth.php';
