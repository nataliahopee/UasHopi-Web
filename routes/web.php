<?php

use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\BookingController;


  
Route::get('/', [AuthController::class, 'dashboard']); 
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


// Route::get('/users', [UserController::class, 'index'])->name('users');
Route::resource('users', UserController::class); //users.index, users.create, users.edit, users.update, users.destroy
Route::get('ruangans', [RuangController::class, 'indexPage'])->name('ruangans.page');

Route::resource('bookings', BookingController::class);

