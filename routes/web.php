<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\SessionsController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlocklyController;
use App\Http\Controllers\LearnController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


Route::get('/html', [LearnController::class, 'index'])->name('html.index');

Route::get('/', [BlocklyController::class, 'hero']);

Route::get('/html/introduccion', [LearnController::class, 'intro'])->name('html.intro');

Route::view('/css', 'dashboard.learn.css')->name('css.intro');

Route::view('/javascript', 'dashboard.learn.js')->name('js.intro');

Route::view('/php', 'dashboard.learn.php')->name('php.intro');


Route::middleware('auth')->group(function () {
    Route::get('/prueba', [BlocklyController::class, 'index']);

    Route::delete('/logout', [SessionsController::class, 'destroy']);


    Route::get('/dashboard', function(){
        return view('dashboard.index', [
            'user' => Auth::user()
        ]);
    })->name('dashboard');

    Route::get('/html/{id}', [LearnController::class, 'mostrarSeccion'])->name('seccion.detalle');

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
