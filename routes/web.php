<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\GuestCreateController;
use App\Http\Controllers\Restore\UserController as RestoreUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('create', [GuestCreateController::class, 'create'])->name('create');
Route::post('store', [GuestCreateController::class, 'store'])->name('store');

Route::middleware(['auth:sanctum', 'verified'])
    ->name('dashboard.')
    ->prefix('dashboard')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');

        Route::middleware(['admin'])->group(function () {
            Route::resource('user', UserController::class);
            Route::resource('guest', GuestController::class);
            Route::get('cetakpdf', [GuestController::class, 'cetakpdf'])->name('guest.cetakpdf');
            Route::get('cetaksesi', [GuestController::class, 'cetaksesi'])->name('guest.cetaksesi');

            // resotore user
            Route::get('restore', [RestoreUserController::class, 'index'])->name('restore');
            Route::get('restore/user/{id}', [RestoreUserController::class, 'restore'])->name('restore.user');
        });
    });
