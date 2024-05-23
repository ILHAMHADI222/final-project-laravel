<?php

use App\Http\Controllers\AuthController;
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

Route::view('/', 'index');

// Menyediakan rute untuk tampilan register dan dash
Route::view('/register', 'auth/register');
Route::view('/dash', 'dash');

// Menggunakan rute eksplisit untuk setiap metode dalam AuthController
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerSave'])->name('register.save');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login_auth'])->name('login_auth'); // Mengarahkan ke loginAction untuk penanganan login

// Melindungi rute 'dash' dengan middleware 'auth'
Route::middleware(['auth'])->group(function () {
    Route::get('/dash', [AuthController::class, 'dash'])->name('dash');
});
