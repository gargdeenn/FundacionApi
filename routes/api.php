<?php

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
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\TypeEventController;

Route::resource('users', UserController::class);
Route::resource('messages', MessageController::class);
Route::resource('eventos', EventoController::class);

// Route::post('login', [\App\Http\Controllers\AuthController::class, 'authenticate']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('refresh', [\App\Http\Controllers\AuthController::class, 'refresh']);
    Route::post('me', [\App\Http\Controllers\AuthController::class, 'me']);
    Route::post('register', [\App\Http\Controllers\AuthController::class, 'register']);
});