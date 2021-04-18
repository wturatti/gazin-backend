<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DeveloperController;

Route::get('/developers', [DeveloperController::class, 'index']);

Route::get('/developers/{id}', [DeveloperController::class, 'show']);

Route::post('/developers', [DeveloperController::class, 'store']);

Route::put('/developers/{id}', [DeveloperController::class, 'update']);

Route::delete('/developers/{id}', [DeveloperController::class, 'delete']);
