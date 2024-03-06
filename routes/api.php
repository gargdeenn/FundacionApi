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
use App\Http\Controllers\ImageController;
use App\Models\Event;

// Route::post('login', [\App\Http\Controllers\AuthController::class, 'authenticate']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    //auth
    Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('refresh', [\App\Http\Controllers\AuthController::class, 'refresh']);
    Route::post('me', [\App\Http\Controllers\AuthController::class, 'me']);
    //Event
    Route::post('event', [\App\Http\Controllers\EventController::class, 'store']);
    Route::get('event', [\App\Http\Controllers\EventController::class, 'show']);
    Route::delete('event/{id}', [\App\Http\Controllers\EventController::class, 'destroy']);
    Route::put('eventPut', [\App\Http\Controllers\EventController::class, 'update']);
    //User
    Route::post('user', [\App\Http\Controllers\UserController::class, 'store']);
    Route::get('user', [\App\Http\Controllers\UserController::class, 'index']);
    Route::delete('user/{id}', [\App\Http\Controllers\UserController::class, 'destroy']);
    Route::put('userPut', [\App\Http\Controllers\UserController::class, 'update']);
});
//Message
Route::post('contact', [\App\Http\Controllers\MessageController::class, 'store']);
Route::get('event/{type_event_id}', [\App\Http\Controllers\EventController::class, 'index']);
Route::get('event_id/{id}', [\App\Http\Controllers\EventController::class, 'show']);
