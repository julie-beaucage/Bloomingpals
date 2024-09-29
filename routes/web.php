<?php

use App\Http\Controllers\MeetupController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CustomVerificationController;



Route::get('/', function () {
    return view('auth.login');
});

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

Route::get('/signIn', [UsersController::class, 'registerForm'])->middleware('guest');
Route::get('/login', [UsersController::class, 'loginForm'])->middleware('guest');
Route::post('/signIn', [UsersController::class, 'create']);
Route::post('/login', [UsersController::class, 'login'])->name('login');
Route::get('/logout', [UsersController::class, 'logout']);

//PROFILE
Route::get('/profile', [UsersController::class, 'profile'])->middleware('auth')->name('profile');
Route::put('/profile/update/{id}', [UsersController::class, 'update'])->middleware('auth')->name('profile.update');
Route::get('profile/amis/{id}', [UsersController::class, 'amis'])->name('profile.amis');
Route::get('profile/personnalite/{id}', [UsersController::class, 'personnalite'])->name('profile.personnalite');
Route::get('profile/interets/{id}', [UsersController::class, 'interets'])->name('profile.interets');

// Meetup
Route::get('/meetupForm', [MeetupController::class, 'createForm']);
Route::post('/meetupForm', [MeetupController::class, 'createForm']);
Route::post('/meetup/create', [MeetupController::class, 'create'])->name('/meetupForm');

// Event
Route::get('/event/{id}', [EventController::class, 'event']);
