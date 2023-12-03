<?php

use App\Http\Controllers\shopController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->middleware('verify.shopify')->name('home');

Route::get('/shop', [shopController::class, 'shop_shop_details'])->middleware('verify.shopify')->name('shop');
Route::get('/collections', [shopController::class, 'shop_collection_save'])->middleware('verify.shopify')->name('collections.index');

Route::post('/collections', [shopController::class, 'shop_collection_save'])->middleware(['verify.shopify'])->name('collections.save');
Route::get('/products/{collection_id}', [shopController::class, 'shop_collection_products'])->middleware(['verify.shopify'])->name('products.index');
Route::post('/products/{collection_id}', [shopController::class, 'shop_collection_products'])->middleware(['verify.shopify'])->name('products.save');
