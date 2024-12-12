<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DiscordWebhookController;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'ShowRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', function () {
    return view('welcome');
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('users', UserController::class);
});


Route::get('/export', function () {
    return Excel::download(new UsersExport, 'users.xlsx');
});

