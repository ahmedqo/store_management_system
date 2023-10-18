<?php

use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;


Route::match(['get', 'post'], '/search/{search}', function ($search) {
    dd($search);
})->name('views.guest.search');

Route::get('/', [GuestController::class, 'home_view'])->name('views.guest.home');

Route::get('/categories', [GuestController::class, 'categories_view'])->name('views.guest.categories');
Route::get('/products/{slug}', [GuestController::class, 'product_view'])->name('views.guest.product');
Route::get('/products', [GuestController::class, 'products_view'])->name('views.guest.products');
Route::get('/brands', [GuestController::class, 'brands_view'])->name('views.guest.brands');
