<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\DishController;
use App\Http\Controllers\Admin\TypologyController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/restourant', [AdminHomeController::class, 'index'])->name('pages.index');
Route::get('/show/{user}', [AdminHomeController::class, 'show'])->name('pages.show');
Route::post('/restourant', [AdminHomeController::class, 'store'])->name('pages.store');
Route::get('/create', [AdminHomeController::class, 'create'])->name('pages.create');

Route::middleware('auth')->name('admin.')->prefix('admin')->group(function() {
    Route::resource('orders', OrderController::class);
    Route::resource('dishes', DishController::class);
    Route::resource('typologies', TypologyController::class);

    // Route for viewing the authenticated user's restaurant
    Route::get('user/{user}', [AdminHomeController::class, 'show'])->name('user.show');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
