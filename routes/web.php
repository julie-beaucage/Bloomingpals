<?php

use App\Http\Controllers\MeetupController;
use App\Http\Controllers\CustomVerificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Models\Rencontre;
use App\Models\demande_rencontre;
use App\Http\Controllers\EventController;



// rappel: le chemin doit être unique pour le routing
/*Route::middleware("auth")->group(function () {
    Route::get('/email/verify', function () {
        return view('auth.verify');
    })->name('verification.notice');
    
    //put all route inside this that use auth
});*/


Route::get('/', function () {
    return view('auth.login');
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

Route::get('/signIn', [UsersController::class, 'registerForm'])->middleware('guest')->name("signIn");
Route::get('/login', [UsersController::class, 'loginForm'])->middleware('guest');
Route::post('/signIn', [UsersController::class, 'create']);
Route::post('/login', [UsersController::class, 'login'])->name('login');
Route::get('/logout', [UsersController::class, 'logout']);
Route::get('/profile', [UsersController::class, 'profile'])->middleware('auth')->name('profile');
Route::put('/profile/update/{id}', [UsersController::class, 'update'])->middleware('auth')->name('profile.update');
Route::get('profile/publications/{id}', [UsersController::class, 'publications'])->name('profile.publications');
Route::get('profile/amis/{id}', [UsersController::class, 'amis'])->name('profile.amis');
Route::get('profile/personnalite/{id}', [UsersController::class, 'personnalite'])->name('profile.personnalite');
Route::get('profile/interets/{id}', [UsersController::class, 'interets'])->name('profile.interets');


// Meetup
Route::get('/meetupForm', [MeetupController::class, 'createForm']);
Route::post('/meetupForm', [MeetupController::class, 'createForm']);
Route::post('/meetup/create', [MeetupController::class, 'create'])->name('/meetupForm');

Route::get('/meetup/page/{meetupId}', [MeetupController::class, 'MeetupPage'])/*->Middleware('auth')*/->name('meetupPage');
Route::post('/meetup/page/join/{meetupId}', [MeetupController::class, 'JoinMeetup'])/*->Middleware('auth')*/->name('joinMeetup');
Route::post('/meetup/page/leave/{meetupId}', [MeetupController::class, 'LeaveMeetup'])/*->Middleware('auth')*/->name('leaveMeetup');

Route::post('/meetup/create', [MeetupController::class, 'create'])->name('/meetupForm');

Route::get('/meetup/requests/{meetupId}', [MeetupController::class, 'MeetupRequests'])/*->Middleware('auth')*/->name('meetupRequests');
Route::get('/meetup/requests/accept/{meetupId}/{userId}', [MeetupController::class, 'AcceptRequest'])/*->Middleware('auth')*/->name('acceptRequest');
Route::get('/meetup/requests/deny/{meetupId}/{userId}', [MeetupController::class, 'DenyRequest'])/*->Middleware('auth')*/->name('denyRequest');



// TODO: remove when all controller are done.
Route::get('/home', function () {
    return view('home.feed');
});

Route::get('/search', function () {
    return view('search.search');
});

// Event
Route::get('/event/{id}', [EventController::class, 'event']);
