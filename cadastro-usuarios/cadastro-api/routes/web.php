<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserListController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserListController::class, 'index'])->name('users.index');
