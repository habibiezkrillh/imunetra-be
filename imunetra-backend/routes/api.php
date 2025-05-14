<?php

use Laravel\Sanctum\HasApiTokens;
use App\Models\User;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});