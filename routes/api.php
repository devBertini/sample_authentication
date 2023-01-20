<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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

// Auth
Route::post('/login', [AuthController::class, 'login']);
Route::post('/recovery', [UserController::class, 'recovey']);


Route::group(['middleware' => ['auth:sanctum']], function() {
    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Users
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{id}', [UserController::class, 'show'])->whereNumber('id');
    Route::post('/users', [UserController::class, 'store']);
    Route::put('/users/{id}', [UserController::class, 'update'])->where('id', '[0-9]+');
    Route::patch('/users/{id}', [UserController::class, 'updatePassword'])->where('id', '[0-9]+');
    
});