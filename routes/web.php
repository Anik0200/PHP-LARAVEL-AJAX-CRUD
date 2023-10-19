<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::resource('products', ProductController::class);
Route::post('products/up', [ProductController::class, 'productsUpdate'])->name('products.up');
Route::post('products/del', [ProductController::class, 'productsDel'])->name('products.del');
Route::get('/pagination/paginate-data', [ProductController::class, 'productsPaginate']);
Route::get('product-search', [ProductController::class, 'searchProduct'])->name('product.search');
