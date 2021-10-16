<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\GameController;
use \App\Http\Controllers\CartController;
use \App\Http\Controllers\TransactionController;
use \App\Http\Controllers\ManageUserController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::prefix('auth')->group(function () {
    Route::middleware('guest')->group(function() {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('showLogin');
        Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('showRegister');
        Route::post('/login', [AuthController::class, 'login'])->name('login');
        Route::post('/register', [AuthController::class, 'register'])->name('register');
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('game')->group(function() {
    Route::get('/{id}', [GameController::class, 'show'])->name('game.show');
});

Route::middleware('auth')->prefix('cart')->group(function() {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/confirm-delete', [CartController::class, 'confirmDelete'])->name('cart.confirm-delete');
    Route::post('/delete', [CartController::class, 'delete'])->name('cart.delete');
});

Route::middleware('auth')->prefix('transaction')->group(function() {
    Route::get('/create', [TransactionController::class, 'create'])->name('transaction.create');
    Route::post('/{id}/receipt', [TransactionController::class, 'store'])->name('transaction.store');
    Route::get('/{id}/receipt', [TransactionController::class, 'showReceipt'])->name('transaction.receipt');
});

Route::middleware('auth')->prefix('manage/game')->group(function() {
    Route::get('/', [GameController::class, 'manage'])->name('manage.game.index');
    Route::post('/', [GameController::class, 'manage'])->name('manage.game.search');
    Route::post('/confirm-delete', [GameController::class, 'confirmDelete'])->name('manage.game.confirm-delete');
    Route::post('/delete', [GameController::class, 'delete'])->name('manage.game.delete');
    Route::get('/create', [GameController::class, 'create'])->name('manage.game.create');
    Route::post('/store', [GameController::class, 'store'])->name('manage.game.store');
    Route::get('/{id}/update', [GameController::class, 'edit'])->name('manage.game.edit');
    Route::post('/{id}/update', [GameController::class, 'update'])->name('manage.game.update');
});

Route::middleware('auth')->prefix('manage/users')->group(function() {
    Route::get('/profile', [ManageUserController::class, 'profile'])->name('manage.user.profile');
    Route::put('/profile', [ManageUserController::class, 'updateProfile'])->name('manage.user.profile.update');
    Route::get('/friends', [ManageUserController::class, 'friends'])->name('manage.user.friends');
});
