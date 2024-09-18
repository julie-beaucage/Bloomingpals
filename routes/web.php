<?php

use App\Http\Controllers\meetupController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;


Route::get('/', function () {
   
   //return view('auth.login');
   return redirect()->action([meetupController::class,'createForm']);
});

Route::get('/signIn', [UsersController::class, 'registerForm'])->middleware('guest');

Route::get('/login', [UsersController::class, 'loginForm'])->middleware('guest');

Route::post('/signIn', [UsersController::class, 'create']);

Route::post('/login', [UsersController::class, 'login'])->name('login');

Route::get('/logout', [UsersController::class, 'logout']);

Route::get('/meetupForm', [meetupController::class, 'createForm']);
Route::post('/meetupForm', [meetupController::class, 'createForm']);
Route::post('/meetup/create', [meetupController::class, 'create'])->name('/meetupForm');

// TODO: remove when all controller are done.
Route::post('/home', function () {
    return view('home.feed');
});

Route::get('/search', function () {
    return view('search.search');
});

Route::get('/profile', function () {
    return view('profile.profile');
})->middleware('auth')->name('profile');;