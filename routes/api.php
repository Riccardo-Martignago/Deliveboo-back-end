<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\TypologyController;
use App\Http\Controllers\Api\DishController;
use App\Http\Controllers\PaymentController;
use Braintree\Gateway;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/user', [HomeController::class, 'index']);
Route::get('/typologies', [TypologyController::class, 'index']);
Route::get('/dishes', [DishController::class, 'index']);
Route::get('/payment/token', [PaymentController::class, 'generateToken']);
Route::post('/order', [OrderController::class, 'createOrder']);
Route::post('/payment/process', [PaymentController::class, 'processPayment']);
Route::get('/api/payment/token', function () {
    $gateway = new Gateway([
        'environment' => 'sandbox',
        'merchantId' => '44nxng54m6y3sxbp',
        'publicKey' => 'dc5b846wsbxy2tzj',
        'privateKey' => '7a327555d8938842b51b0dc3ad2cf4ce'
    ]);

    return response()->json([
        'token' => $gateway->clientToken()->generate()
    ]);
});
