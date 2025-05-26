<?php

use Laravel\Sanctum\HasApiTokens;
use App\Models\User;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserRelawanController;
use App\Http\Controllers\UserTenagaMedisController;

// API User
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request-user();
});

// API Login, Register, Logout
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('relawan', UserRelawanController::class);
    Route::apiResource('tenaga-medis', UserTenagaMedisController::class);
});