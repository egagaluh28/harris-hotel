<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GridRoomController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
// Home
Route::get('/', [RoomController::class, 'index'])->name('home');
Route::get('/room', [GridRoomController::class, 'grid'])->name('room-grid');
Route::get('/room/{id}', [GridRoomController::class, 'detail'])->name('room-details');
Route::get('/contact', function () {
    return view('contact');
});


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');