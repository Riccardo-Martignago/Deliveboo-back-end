<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\DishController;
use App\Http\Controllers\Admin\TypologyController;

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
});

Auth::routes();

// Route::get('/home', [GuestHomeController::class, 'index'])->name('home');

Route::middleware('auth')->name('admin.')->prefix('admin/')->group(function(){
        //Rotte protette
    // Route::get('secret-home', [AdminHomeController::class, 'index'])->name('home');
    Route::resource('user', AdminHomeController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('dishes', DishController::class);
    Route::resource('/show', DishController::class);
    Route::resource('/create', DishController::class);
    Route::resource('typologies', TypologyController::class);

    // Route::resource('/show',AdminHomeController::class);

    }
);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


