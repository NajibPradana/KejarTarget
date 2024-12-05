<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BeasiswaController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
 
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});

// Route untuk halaman tambah beasiswa
Route::get('/admin/tambahbeasiswa', function () {
    return view('admin.tambahbeasiswa');
})->name('admin.tambahbeasiswa');


Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/admin/dashboard', [BeasiswaController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/tambahbeasiswa', [BeasiswaController::class, 'create'])->name('beasiswa.create');
    Route::post('/admin/tambahbeasiswa', [BeasiswaController::class, 'store'])->name('beasiswa.store');
    Route::get('/admin/editbeasiswa/{id}', [BeasiswaController::class, 'edit'])->name('beasiswa.edit');
    Route::put('/admin/editbeasiswa/{id}', [BeasiswaController::class, 'update'])->name('beasiswa.update');
    Route::delete('/admin/deletebeasiswa/{id}', [BeasiswaController::class, 'destroy'])->name('beasiswa.destroy');
});

Route::get('/dashboard', [BeasiswaController::class, 'userDashboard'])->name('dashboard');
Route::get('/detail/{id}', [BeasiswaController::class, 'show'])->name('detail');

