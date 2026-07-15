<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlocklyController;

Route::get('/', [BlocklyController::class, 'index']);