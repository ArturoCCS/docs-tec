<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlocklyController;

Route::get('/', [BlocklyController::class, 'index']);

Route::get('/register', [RegisteredUserController::class, 'create']);

Route::post('/register', [RegisteredUserController::class, 'store']);
