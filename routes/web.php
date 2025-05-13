<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TabunganController;
use App\Http\Controllers\MenabungController;

// ✅ Route publik
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
    Route::post('/tabungan/{tabungan}/menabung', [MenabungController::class, 'store'])->name('menabung.store');

    // ✅ Logout di dalam auth
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
//});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [TabunganController::class, 'index'])->name('home');

    // Ini sudah cukup untuk semua: index, create, store, show, edit, update, destroy
    Route::resource('tabungan', TabunganController::class);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});



