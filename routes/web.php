<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Limpai\Painel\{
  HomeController,
  ServiceController,
  UserController
};

use Illuminate\Support\Facades\Route;

#Route Login
Route::get('/', [LoginController::class, 'showLoginForm']);
#Route Login

Route::middleware('auth')->group(function () {

  #Home
  Route::get('/home', [HomeController::class, 'index'])->name('home');
  #Home

  #Service
  Route::resource('service', ServiceController::class);
  #Service

  #User
  Route::resource('user', UserController::class);
  #User

});

Auth::routes(['register' => false]);
