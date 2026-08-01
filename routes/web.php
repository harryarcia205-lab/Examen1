<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ShippingAddressController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\OrderlinesController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\FactoryArticlesController;
use App\Http\Controllers\FactoriesController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('clients', ClientController::class);
    Route::resource('shippingAddresses', ShippingAddressesController::class);
    Route::resource('orders', OrdersController::class);
    Route::resource('orderlines', OrderlinesController::class);
    Route::resource('articles', ArticlesController::class);
    Route::resource('factoryarticles', FactoryArticlesController::class);
    Route::resource('factories', FactoriesController::class);
    Route::resource('notes',NotesController::class);
    Route::resource('categories',CategoriesController::class);
    {
        
    }
    
});

require __DIR__.'/auth.php';
