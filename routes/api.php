<?php

use App\Http\Controllers\RegionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('user',UserController::class)->except('index','show');
Route::post('user/login',[UserController::class,'login']);
Route::get('user/profile',[UserController::class,'show'])->middleware('auth:sanctum');

Route::apiResource('region',RegionController::class);
