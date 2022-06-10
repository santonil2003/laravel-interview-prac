<?php

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

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::post('/new', [ProductController::class, 'new'])->name('products.new');
    Route::delete('/delete', [ProductController::class, 'delete'])->name('products.delete');
});

Route::get('/', fn() => redirect('/products'));
