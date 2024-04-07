<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Http\Request;



Route::group(
    [
        'middleware' => [ 'auth:stagaire']
    ], function () {

Route::get('/stagaire/dashboard', function () {
    return view('welcome');
})->name('dashboard.Students');
    }
);
