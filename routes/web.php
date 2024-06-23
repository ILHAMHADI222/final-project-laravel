<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleAuthController; // Import GoogleAuthController
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('index');

// Routes for registration and dashboard views
Route::view('/register', 'auth.register');
Route::view('/dash', 'dash');

// Explicit routes for AuthController methods
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerSave'])->name('register.save');

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'login_auth'])->name('login_auth');
});

// checkrole
// Protect the dashboard route with 'auth' middleware
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dash', [AuthController::class, 'dash'])->name('dash');
    Route::get('/dashboard/user_dashboard', [UserDashboardController::class, 'index'])->name('user_dashboard.index');
    Route::get('/dashboard/user_dashboard/create', [UserDashboardController::class, 'create'])->name('user_dashboard.create');
    Route::post('/dashboard/user_dashboard', [UserDashboardController::class, 'store'])->name('user_dashboard.store');
    Route::get('/dashboard/user_dashboard/{id_sekolah}/edit', [UserDashboardController::class, 'edit'])->name('user_dashboard.edit');
    Route::put('/dashboard/user_dashboard/{id_sekolah}', [UserDashboardController::class, 'update'])->name('user_dashboard.update');
    Route::delete('/dashboard/user_dashboard/{id_sekolah}', [UserDashboardController::class, 'destroy'])->name('user_dashboard.destroy');
});

// Protect user dashboard route with 'auth' and 'verified' middleware
Route::middleware(['auth', 'verified', 'role:user'])->group(function () {
    Route::get('/user', [SekolahController::class, 'index'])->name('user.index');
    Route::get('/user/mulai_perhitungan', [SekolahController::class, 'mulaiPerhitungan'])->name('user.mulai_perhitungan');
});

// forgot-password
Route::get('/forgot-password', [AuthController::class, 'forgot_password'])->name('forgot-password');
Route::post('/forgot-password-act', [AuthController::class, 'forgot_password_act'])->name('forgot-password-act');

// validasi
Route::get('validasi-forgot-password/{token}', [AuthController::class, 'validasi_forgot_password'])->name('validasi-forgot-password');
Route::post('/validasi-forgot-password-act', [AuthController::class, 'validasi_forgot_password_act'])->name('validasi-forgot-password-act');

// Routes for Google authentication
Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle'])->name('google-callback');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protect the dashboard route with 'auth' middleware
Route::middleware(['auth', 'ensureLoggedOut'])->group(function () {
    Route::get('/dash', [AuthController::class, 'dash'])->name('dash');
});

// email verifed
Route::middleware(['auth'])->group(function () {
    Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['signed'])->name('verification.verify');
    Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
});

// Protect your dashboard route to ensure only verified users can access it
Route::middleware(['auth', 'verified'])->get('/dash', [AuthController::class, 'dash'])->name('dash');
Route::resource('user_dashboard', UserDashboardController::class);

// dash
Route::prefix('user_dashboard')->name('dashboard_user.')->group(function () {
    Route::get('/', [UserDashboardController::class, 'index'])->name('index');
    Route::get('/create', [UserDashboardController::class, 'create'])->name('create');
    Route::post('/', [UserDashboardController::class, 'store'])->name('store');
    Route::get('/{id_sekolah}/edit', [UserDashboardController::class, 'edit'])->name('edit');
    Route::put('/{id_sekolah}', [UserDashboardController::class, 'update'])->name('update');
    Route::delete('/{id_sekolah}', [UserDashboardController::class, 'destroy'])->name('destroy');
});
