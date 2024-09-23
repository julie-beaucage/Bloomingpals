<?php

use App\Http\Controllers\meetupController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CustomVerificationController;



Route::get('/', function () {
    return redirect('/meetupForm/1');
});

Route::get('/email/verify/{id}/{hash}', [CustomVerificationController::class, 'verify'])->name('verification.verify');

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [CustomVerificationController::class, 'verify'])->name('verification.verify');

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/signIn', [UsersController::class, 'registerForm'])->middleware('guest');

Route::get('/login', [UsersController::class, 'loginForm'])->middleware('guest');

Route::post('/signIn', [UsersController::class, 'create']);

Route::post('/login', [UsersController::class, 'login'])->name('login');

Route::get('/logout', [UsersController::class, 'logout']);

Route::get('/profile', [UsersController::class, 'profile'])->middleware('auth')->name('profile');


Route::post('/meetupForm', [meetupController::class, 'Form']);
Route::get('/meetupForm', [meetupController::class, 'Form']);
Route::get('/meetupForm/{id}', [meetupController::class, 'Form']);
Route::post('/meetup/create', [meetupController::class, 'create']);
Route::post('/meetup/edit', [meetupController::class, 'edit']);



// TODO: remove when all controller are done.
Route::get('/home', function () {
    return view('home.feed');
});

Route::get('/search', function () {
    return view('search.search');
});

Route::get('/profile', function () {
    return view('profile.profile');
})->middleware('auth')->name('profile');
