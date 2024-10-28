<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MahasiswaController;


Route::get('/', function () {
    return view('welcome');
});

// Define the login route
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Define the register route
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Define the admin routes
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::put('/admin/verify/{id}', [AdminController::class, 'verifyUser'])->name('admin.verify');
    Route::get('/admin/edit/{id}', [AdminController::class, 'editUser'])->name('admin.edit');
    Route::put('/admin/update/{id}', [AdminController::class, 'updateUser'])->name('admin.update');
    Route::delete('/admin/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.delete');
    Route::get('/admin/create', [AdminController::class, 'createUser'])->name('admin.create');
    Route::post('/admin/store', [AdminController::class, 'storeUser'])->name('admin.store');
    
// Define the mahasiswa route
Route::get('/mahasiswa', function () {
    return view('mahasiswa.index');
})->name('mahasiswa.index');

// Define the logout route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Define the profile routes
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

// Define the not verified route
Route::get('/not-verified', function () {
    return view('not_verified');
})->name('not.verified');

Route::middleware(['auth'])->group(function () {
    Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
    Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
});