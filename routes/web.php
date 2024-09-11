<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

/*
Route::get('/', function () {
    return view('home.feed'); // TODO: Change this with the controller when it's ready.
});
*/

Route::get('/', function () {
    return view('login.login');
});

Route::get('/signIn', [UsersController::class, 'registerForm'])->middleware('guest');

Route::get('/login', [UsersController::class, 'loginForm'])->middleware('guest');

Route::post('/signIn', [UsersController::class, 'create']);

Route::post('/login', [UsersController::class, 'login'])->name('login');

Route::get('/logout', [UsersController::class, 'logout']);

// TODO: remove when all controller are done.
Route::get('/home', function () {
    return view('home.feed');
});

Route::get('/search', function () {
    return view('search.search');
});

Route::get('/profile', function () {
    return view('profile.profile');
})->middleware('auth')->name('profile');;