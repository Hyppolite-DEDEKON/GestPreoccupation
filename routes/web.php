<?php

use App\Http\Controllers\PreoccupationController;
use App\Models\Preoccupation;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    Route::resource('/preoccupations', PreoccupationController::class)->middleware('auth');

    Route::middleware(['auth'])->group(function () {
        Route::resource('preoccupations', PreoccupationController::class);
    });
require __DIR__.'/auth.php';
