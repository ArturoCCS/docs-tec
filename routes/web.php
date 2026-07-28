<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\SessionsController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlocklyController;
use App\Http\Controllers\LearnController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

Route::get('/{carpeta}', [LearnController::class, 'mostrarSeccion'])
    ->defaults('id', 'index')
    ->where('carpeta', 'html|css|js|php')
    ->name('curso.index');

Route::get('/{carpeta}/introduction', [LearnController::class, 'mostrarSeccion'])
    ->defaults('id', 'introduction')
    ->where('carpeta', 'html|css|js|php')
    ->name('curso.intro');


Route::get('/', [BlocklyController::class, 'hero']);

Route::middleware('auth')->group(function () {
    Route::get('/prueba', [BlocklyController::class, 'index']);

    Route::delete('/logout', [SessionsController::class, 'destroy']);

    Route::get('/dashboard', function () {
        return view('dashboard.index', [
            'user' => Auth::user()
        ]);
    })->name('dashboard');

    Route::get('/{carpeta}/{id}', [LearnController::class, 'mostrarSeccion'])
        ->where('carpeta', 'html|css|js|php')
        ->name('seccion.detalle');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/login', [SessionsController::class, 'store'])->name('login');
});

Route::get('/admin', function () {
    Gate::authorize('view-admin');

    return "Privado";
});
