<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ApiProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/', [ApiController::class, 'index']);
Route::get('/products', [ApiProductsController::class, 'index']);
Route::post('/products', [ApiProductsController::class, 'store']);
Route::get('/products/{id}', [ApiProductsController::class, 'show']);
Route::put('/products/{id}', [ApiProductsController::class, 'update']);
Route::delete('/products/{id}', [ApiProductsController::class, 'destroy']);
