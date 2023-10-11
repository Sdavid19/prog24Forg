<?php

use App\Http\Controllers\etelFelajanlasController;
use App\Http\Controllers\etelFelajanloController;
use App\Http\Controllers\etelMentoController;
use App\Http\Controllers\jotekonysagiSzervezetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/create-food', [etelFelajanlasController::class, 'createFood']);

Route::post('/user-signup', [etelMentoController::class, 'store']);
Route::post('/user-login', [etelMentoController::class, 'loginRequest']);
Route::post('/user-modify/{id}', [etelMentoController::class, 'update']);

Route::post('/charity-signup', [jotekonysagiSzervezetController::class, 'store']);
Route::post('/charity-login', [jotekonysagiSzervezetController::class, 'loginRequest']);
Route::post('/charity-modify', [jotekonysagiSzervezetController::class, 'update']);

Route::post('/advertiser-signup', [etelFelajanloController::class, 'store']);
Route::post('/advertiser-login', [etelFelajanloController::class, 'loginRequest']);
Route::post('/advertiser-modify', [etelFelajanloController::class, 'update']);


