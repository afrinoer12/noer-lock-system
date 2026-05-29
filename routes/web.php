<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoorController;
use App\Http\Controllers\FingerprintUserController;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/door/unlock', [DoorController::class, 'unlock'])->name('door.unlock');
Route::post('/door/lock', [DoorController::class, 'lock'])->name('door.lock');

Route::get('/fingerprint', [FingerprintUserController::class, 'index'])->name('fingerprint.index');
Route::post('/fingerprint', [FingerprintUserController::class, 'store'])->name('fingerprint.store');
Route::delete('/fingerprint/{id}', [FingerprintUserController::class, 'destroy'])->name('fingerprint.destroy');