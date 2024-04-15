<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AllAnimal;
use App\Http\Controllers\AdminController;

Route::apiResource('admins',AdminController::class);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('user',UserController::class)->except('index','show');
Route::post('user/login',[UserController::class,'login']);
Route::get('user/profile',[UserController::class,'show'])->middleware('auth:sanctum');

Route::apiResource('region',RegionController::class);

Route::middleware('auth:sanctum')->apiResource('animal', AnimalController::class);

Route::middleware('auth:sanctum')->apiResource('animals', AllAnimal::class)->except('destroy','store');
