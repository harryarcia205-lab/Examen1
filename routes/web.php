<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FactoryArticleController;
use App\Http\Controllers\FactoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderLineController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShippingAddressController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified', 'prevent-back-history'])->group(function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('client', ClientController::class);

    Route::resource('shippingAddress', ShippingAddressController::class);

    Route::resource('order', OrderController);

    Route::resource('orderlines', OrderLineController);

    Route::resource('article', ArticleController);

    Route::resource('factoryarticle', FactoryArticleController);

    Route::resource('factory', FactoryController);

Route::middleware('auth ')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



