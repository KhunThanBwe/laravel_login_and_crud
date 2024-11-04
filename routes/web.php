<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/welcome', [ProductController::class, 'welcomeView']);

// Route::get('/product/{id}', [ProductController::class, 'getProduct'])->name('get_product');

Route::get('/', function() {
    return "Hello";
});

Route::middleware(['auth'])->controller(ProductController::class)->group(function() {
    Route::get('/products', 'productList')->name('product_list');
    Route::get('/product/create', 'createForm')->name('product_create_form');

    Route::post('/product/store', 'storeProduct')->name('store_product');

    Route::get('/product/{id}', 'getProduct')->name('get_product');
    Route::put('/product/update/{id}', 'updateProduct')->name('update_product');

    Route::delete('/product/delete/{id}', 'deleteProduct')->name('delete_product');

    Route::get('/user', 'getUser')->name('get_user');

});




Auth::routes();

Route::get('/test', [HomeController::class, 'index'])->name('home');
