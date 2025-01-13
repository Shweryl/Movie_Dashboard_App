<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/user-management', function () {
    return view('users/user-management');
})->name('user-management');

Route::get('/user-edit', function () {
    return view('users/user-edit');
})->name('user-edit');
Route::get('/user-profile', function () {
    return view('users/user-profile');
})->name('user-profile');
Route::get('/user-create', function () {
    return view('users/user-create');
})->name('user-create');




Route::get('/logout', function () {
    return view('welcome');
})->name('logout');

Route::get('/login', function () {
    return view('Auth/login');
})->name('login');
Route::get('/register', function () {
    return view('Auth/Register');
})->name('register');


Route::resource('movies', MovieController::class);
