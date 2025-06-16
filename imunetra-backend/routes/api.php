<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserRelawanController;
use App\Http\Controllers\UserTenagaMedisController;

// =======================
// === AUTH SECTION =====
// =======================

// Register
Route::post('/register/relawan', [AuthController::class, 'registerRelawan']);
Route::post('/register/tenaga-medis', [AuthController::class, 'registerTenagaMedis']);

// Login
Route::post('/login/relawan', [AuthController::class, 'loginRelawan']);
Route::post('/login/tenaga-medis', [AuthController::class, 'loginTenagaMedis']);

// ================================
// === RELAWAN (CRUD sederhana) ===
// ================================
Route::get('/relawan', [UserRelawanController::class, 'index']);           // list all
Route::get('/relawan/{id}', [UserRelawanController::class, 'show']);       // show one
Route::put('/relawan/{id}', [UserRelawanController::class, 'update']);     // update
Route::delete('/relawan/{id}', [UserRelawanController::class, 'destroy']); // delete

// =======================================
// === TENAGA MEDIS (CRUD sederhana) =====
// =======================================
Route::get('/tenaga-medis', [UserTenagaMedisController::class, 'index']);           // list all
Route::get('/tenaga-medis/{id}', [UserTenagaMedisController::class, 'show']);       // show one
Route::put('/tenaga-medis/{id}', [UserTenagaMedisController::class, 'update']);     // update
Route::delete('/tenaga-medis/{id}', [UserTenagaMedisController::class, 'destroy']); // delete
