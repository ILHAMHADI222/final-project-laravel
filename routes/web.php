<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\JarakController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    // Routes for registration and dashboard views
    Route::view('/register', 'auth.register');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerSave'])->name('register.save');

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'login_auth'])->name('login_auth');

    // Routes for Google authentication
    Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
    Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle'])->name('google-callback');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // User routes
    Route::middleware('role:user')->group(function () {
        Route::get('/user', [SekolahController::class, 'index'])->name('user.index');
        Route::get('/user/mulai_perhitungan', [SekolahController::class, 'mulaiPerhitungan'])->name('user.mulai_perhitungan');
        Route::post('/simpan-jarak', [JarakController::class, 'simpanJarak'])->name('simpanJarak');
        Route::get('/user/hitung_bobot', [JarakController::class, 'hitungBobot'])->name('user.hitung_bobot');
        Route::post('/simpan-bobot', [JarakController::class, 'simpanBobot'])->name('simpanBobot');
        Route::get('/user/hasil_result', [HasilController::class, 'index'])->name('user.hasil_result');
        Route::get('/user/hasil', 'HasilController@index')->middleware('role:user');
    });

    // Admin routes
    Route::middleware('role:admin')->group(function () {
        Route::get('/dash', [AuthController::class, 'admin'])->name('dash');
        Route::get('/dashboard/user_dashboard', [UserDashboardController::class, 'index'])->name('user_dashboard.index');
        Route::get('/dashboard/user_dashboard/create', [UserDashboardController::class, 'create'])->name('user_dashboard.create');
        Route::post('/dashboard/user_dashboard', [UserDashboardController::class, 'store'])->name('user_dashboard.store');
        Route::get('/dashboard/user_dashboard/{id_sekolah}/edit', [UserDashboardController::class, 'edit'])->name('user_dashboard.edit');
        Route::put('/dashboard/user_dashboard/{id_sekolah}', [UserDashboardController::class, 'update'])->name('user_dashboard.update');
        Route::delete('/dashboard/user_dashboard/{id_sekolah}', [UserDashboardController::class, 'destroy'])->name('user_dashboard.destroy');
    });
});

Route::get('/forgot-password', [AuthController::class, 'forgot_password'])->name('forgot-password');
Route::post('/forgot-password-act', [AuthController::class, 'forgot_password_act'])->name('forgot-password-act');
Route::get('validasi-forgot-password/{token}', [AuthController::class, 'validasi_forgot_password'])->name('validasi-forgot-password');
Route::post('/validasi-forgot-password-act', [AuthController::class, 'validasi_forgot_password_act'])->name('validasi-forgot-password-act');

Route::middleware(['auth'])->group(function () {
    Route::get('/dash', [AuthController::class, 'admin'])->name('dash');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::view('/dash', 'dashboard_user.index');
    Route::prefix('user_dashboard')->name('dashboard_user.')->group(function () {
        Route::get('/', [UserDashboardController::class, 'index'])->name('index');
        Route::get('/create', [UserDashboardController::class, 'create'])->name('create');
        Route::post('/', [UserDashboardController::class, 'store'])->name('store');
        Route::get('/{id_sekolah}/edit', [UserDashboardController::class, 'edit'])->name('edit');
        Route::put('/{id_sekolah}', [UserDashboardController::class, 'update'])->name('update');
        Route::delete('/{id_sekolah}', [UserDashboardController::class, 'destroy'])->name('destroy');
    });
});

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::middleware(['auth'])->group(function () {
    Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['signed'])->name('verification.verify');
    Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
});
