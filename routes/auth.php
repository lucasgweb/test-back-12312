<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;


Route::get('/login', [AuthController::class, 'index'])->middleware('guest')
    ->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])
    ->name('login.authenticate');
Route::get('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::get('/cadastro', [AuthController::class, 'signup'])
    ->name('signup');
Route::post('/cadastro', [AuthController::class, 'signupAction'])
    ->name('register');



Route::get('/email/verify', [VerifyEmailController::class,'verificationNotice'])
    ->middleware('auth')
    ->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, 'verificationVerify'])
    ->middleware(['auth','signed'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [VerifyEmailController::class, 'verificationSend'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

Route::get('/forgot-password', [PasswordResetController::class,'passwordRequest'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetController::class,'passwordEmail'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [PasswordResetController::class,'passwordReset'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password',[PasswordResetController::class,'passwordUpdate'])
    ->middleware('guest')
    ->name('password.update');

