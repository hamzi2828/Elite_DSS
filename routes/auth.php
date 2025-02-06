<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\PasswordResetController;

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticationController::class, 'index'])->name('login');
    Route::post('login_user', [AuthenticationController::class, 'login'])->name('login.user');    
    Route::get('register', [RegistrationController::class, 'index'])->name('register');
    Route::post('register_user', [RegistrationController::class, 'store'])->name('register.user');

    Route::get('forget-password', [PasswordResetController::class, 'index'])->name('forget.password');
});

Route::post('logout', [AuthenticationController::class, 'destroy'])->name('logout');
