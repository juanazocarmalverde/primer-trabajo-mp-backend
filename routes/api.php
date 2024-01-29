<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiProductController;
use App\Http\Controllers\ApiUsuariosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebpayController;


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

Route::apiResource('products', ApiProductController::class);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('products', ApiProductController::class);
    Route::apiResource('usuarios', ApiUsuariosController::class);
    Route::post('usuarios/login', [ApiUsuariosController::class, 'login']);
    Route::post('webpay/transactions', [WebpayController::class, 'transactions']);
    Route::put('webpay/transactions', [WebpayController::class, 'confirm_transaction']);
    Route::get('webpay/transactions', [WebpayController::class, 'get_transaction']);
    Route::post('webpay/transactions/refunds', [WebpayController::class, 'refund_transactions']);


});


Route::post("login", [UserController::class,'index']);
