<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WaterIntakeController;
use App\Http\Controllers\EducationController;
use Illuminate\Support\Facades\Route;

// 1. Halaman Depan (Redirect ke Login)
Route::get('/', function () {
    return redirect()->route('login');
});

// 2. Grup Route yang WAJIB LOGIN
Route::middleware(['auth', 'verified'])->group(function () {
    
    // --- DASHBOARD & UTAMA ---
    Route::get('/dashboard', [WaterIntakeController::class, 'index'])->name('dashboard');
    Route::get('/about', [WaterIntakeController::class, 'about'])->name('about');

    // --- HITUNG KEBUTUHAN ---
    Route::get('/calculate', [WaterIntakeController::class, 'calculate'])->name('calculate');
    Route::post('/save-target', [WaterIntakeController::class, 'saveTarget'])->name('save.target');

    // --- PENGINGAT & UPDATE DATA AIR ---
    Route::get('/reminder', [WaterIntakeController::class, 'reminder'])->name('reminder');
    Route::post('/update-water', [WaterIntakeController::class, 'update'])->name('water.update');

    // --- EDUKASI & PROGRESS ---
    Route::get('/education', [EducationController::class, 'index'])->name('education.index');
    Route::get('/education/{id}', [EducationController::class, 'show'])->name('education.show');
    Route::get('/progress', [WaterIntakeController::class, 'progress'])->name('progress');

    // --- PROFILE BAWAAN BREEZE ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/logout', [ProfileController::class, 'destroy'])->name('logout'); // Biasanya POST
});

require __DIR__.'/auth.php';