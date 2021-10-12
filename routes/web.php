<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('home');

Route::prefix('auth')->group(function () {
    Route::middleware('guest')->group(function() {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('showLogin');
        Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('showRegister');
        Route::post('/login', [AuthController::class, 'login'])->name('login');
        Route::post('/register', [AuthController::class, 'register'])->name('register');
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
