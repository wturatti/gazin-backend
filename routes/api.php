<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DeveloperController;

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

//Route::get('/user/{id}', [Controller::class, 'show']);

//Route::get('/developers', 'index');


Route::get('/developers', [DeveloperController::class, 'index']);

Route::get('/developers/{id}', [DeveloperController::class, 'show']);

Route::post('/developers', [DeveloperController::class, 'store']);

Route::put('/developers/{id}', [DeveloperController::class, 'update']);

Route::delete('/developers/{id}', [DeveloperController::class, 'delete']);
