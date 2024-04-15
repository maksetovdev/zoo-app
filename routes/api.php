<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AllAnimal;
use App\Http\Controllers\AdminController;

//superadmin
Route::middleware(['auth:sanctum','superadmin'])->apiResource('admins',AdminController::class);
//admin
Route::middleware(['auth:sanctum','admin'])->apiResource('region',RegionController::class);
//all users
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('user',UserController::class)->except('index','show');
Route::post('user/login',[UserController::class,'login']);
Route::get('user/profile',[UserController::class,'show'])->middleware('auth:sanctum');
Route::middleware('auth:sanctum')->apiResource('animal', AnimalController::class);
Route::middleware('auth:sanctum')->apiResource('animals', AllAnimal::class)->except('destroy','store');
