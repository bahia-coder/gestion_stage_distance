<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

Route::group(['namespace' => 'Auth'], function () {
    // Routes de connexion
    Route::get('/login/{type}', [LoginController::class, 'loginForm'])->middleware('guest')->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/logout/{type}', [LoginController::class, 'logout'])->name('logout');

    // Routes de réinitialisation du mot de passe
    Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
});

Route::get('/', function () {
    return view('auth.selection');
})->name('selection');




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/homee', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('home');


        Route::group(['middleware' => ['auth']], function () {
            Route::resource('Departement', 'DepartementController');
        });
