<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);



Route::get('products/low-stock', [ProductController::class, 'lowStock']);
// routes/web.php

// Route::get('products/lowStock', [ProductController::class, 'lowStock'])->name('products.lowStock');


