<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::post('/register', [UserController::class, 'register']);
Route::get('/dashboard', [UserController::class, 'getDashboardData']);
Route::get('/dashboard', [DashboardController::class, 'index']);