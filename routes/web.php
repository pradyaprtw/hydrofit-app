<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WaterIntakeController;
use Illuminate\Support\Facades\Route;

// 1. Halaman Depan (Redirect ke Login)
Route::get('/', function () {
    return redirect()->route('login');
});

// 2. Grup Route yang Wajib Login
Route::middleware(['auth', 'verified'])->group(function () {
    
    // --- DASHBOARD ---
    Route::get('/dashboard', [WaterIntakeController::class, 'index'])->name('dashboard');

    // --- HITUNG KEBUTUHAN ---
    Route::get('/calculate', [WaterIntakeController::class, 'calculate'])->name('calculate');
    Route::post('/save-target', [WaterIntakeController::class, 'saveTarget'])->name('save.target');

    // --- PENGINGAT ---
    Route::get('/reminder', [WaterIntakeController::class, 'reminder'])->name('reminder');

    // --- SIMPAN ASUPAN AIR (Ini yang tadi Error!) ---
    Route::post('/update-water', [WaterIntakeController::class, 'update'])->name('water.update');

    // Route Edukasi
    Route::get('/education', [App\Http\Controllers\EducationController::class, 'index'])->name('education.index');
    Route::get('/education/{id}', [App\Http\Controllers\EducationController::class, 'show'])->name('education.show');

    // Route Halaman Progress
    Route::get('/progress', [WaterIntakeController::class, 'progress'])->name('progress');

    // Route Halaman Tentang Aplikasi
    Route::get('/about', [WaterIntakeController::class, 'about'])->name('about');   

    // --- PROFILE BAWAAN BREEZE ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 3. Include Route Auth (Login/Register)
require __DIR__.'/auth.php';