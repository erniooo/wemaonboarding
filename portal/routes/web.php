<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\MockLoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Modules\GrundlagenController;

Route::get('/', function () {
    return session()->has('display_name')
        ? redirect()->route('dashboard')
        : redirect()->route('login');
})->name('home');

Route::middleware('redirect.if.display.name')->group(function () {
    Route::get('/login', [MockLoginController::class, 'show'])->name('login');
    Route::post('/login', [MockLoginController::class, 'store'])->name('login.store');
});

Route::post('/logout', [MockLoginController::class, 'destroy'])->name('logout');

Route::middleware('display.name')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/modules/grundlagen', [GrundlagenController::class, 'show'])->name('modules.grundlagen');
    Route::post('/modules/grundlagen/lessons/{lessonKey}', [GrundlagenController::class, 'toggle'])
        ->name('modules.grundlagen.lessons.toggle');
});
