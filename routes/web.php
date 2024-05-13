<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\GridRoomController;

use App\Http\Controllers\KamarController;

Route::get('/upload-kamar', [KamarController::class, 'index']);
Route::post('/upload-kamar', [KamarController::class, 'create'])->name('upload-kamar');




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


// login
Route::get('/login', function () {
    return view('login');
});

Route::get('/ini', function () {
    return view('room-details');
});


// Home
Route::get('/', [RoomController::class, 'index']);



// tes database

Route::get('/test', function () {
    $users = App\Models\Pengguna::all();
    return view('test', compact('users'));
});


// Route::get('/', function () {
//     $users = App\Models\Pengguna::all();
//     return view('test', ['users' => $users]); // Kirim variabel $users ke view
// });



// Room
Route::get('/room-grid', [GridRoomController::class, 'grid']);

Route::get('/room-details/{id}', [GridRoomController::class, 'detail'])->name('room-details');

// Route::get('/room-details', function () {
//     return view('room-details');
// });




// Contact
Route::get('/contact', function () {
    return view('contact');
});