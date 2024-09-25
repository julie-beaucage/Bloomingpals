<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CustomVerificationController;



Route::get('/', function () {
    return view('auth.login');
});

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
//Route::get('/profile/profilForm', [UsersController::class, 'edit'])->middleware('auth');
Route::put('/profile/update/{id}', [UsersController::class, 'update'])->middleware('auth')->name('profile.update');

//Route::get('/profile/edit', [UsersController::class, 'edit'])->middleware('auth')->name('profile.edit');

Route::get('profile/publications/{id}', [UsersController::class, 'publications'])->name('profile.publications');
Route::get('profile/amis/{id}', [UsersController::class, 'amis'])->name('profile.amis');
Route::get('profile/personnalite/{id}', [UsersController::class, 'personnalite'])->name('profile.personnalite');
Route::get('profile/interets/{id}', [UsersController::class, 'interets'])->name('profile.interets');



// TODO: remove when all controller are done.
Route::get('/home', function () {
    return view('home.feed');
});

Route::get('/search', function () {
    return view('search.search');
});
/*
Route::get('/profile', function () {
    return view('profile.profile');
})->middleware('auth')->name('profile');;*/