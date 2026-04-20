<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| PUBLIC (HOME / SHOP)
|--------------------------------------------------------------------------
*/

// 🏠 Home page (public view)
Route::get('/', function () {
    $products = Product::all();
    return view('shop.index', compact('products'));
});

/*
|--------------------------------------------------------------------------
| ADMIN DASHBOARD (CRUD)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', ProductController::class);
});