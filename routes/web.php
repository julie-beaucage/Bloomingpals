<?php

use App\Http\Controllers\MeetupController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CustomVerificationController;



Route::get('/', [MeetupController::class, 'index']);

// TODO: remove when all controller are done.
Route::get('/home', function () {
    return view('home.feed');
});

Route::get('/search', function () {
    return view('search.search');
});

// Authentification
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

// Meetup
Route::get('/meetupForm', [MeetupController::class, 'Form']);
Route::get('/meetupForm', [MeetupController::class, 'Form']);
Route::get('/meetupForm/{id}', [MeetupController::class, 'Form']);
Route::post('/meetup/create', [MeetupController::class, 'create']);
Route::post('/meetup/edit/{id}', [MeetupController::class, 'edit']);
Route::get('/meetup',[MeetupController::class, 'index']);

// Event
Route::get('/event/{id}', [EventController::class, 'event']);
