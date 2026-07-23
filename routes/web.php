<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\SessionsController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlocklyController;
use Illuminate\Support\Facades\Gate;

Route::middleware('auth')->group(function () {
    Route::get('/prueba', [BlocklyController::class, 'index']);

    Route::delete('/logout', [SessionsController::class, 'destroy']);


    Route::get('/html', [BlocklyController::class, 'index']);

    Route::view('/css', 'dashboard.learn.css');

    Route::view('/javascript', 'dashboard.learn.js');

    Route::view('/php', 'dashboard.learn.php');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create']);

    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionsController::class, 'create']);

    Route::post('/login', [SessionsController::class, 'store']);
});


Route::get('/', [BlocklyController::class, 'hero']);

Route::get('/admin', function () {
    Gate::authorize('view-admin');

    return "Privado";
});
