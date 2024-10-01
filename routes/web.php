<?php

use App\Http\Controllers\MeetupController;
use App\Http\Controllers\CustomVerificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Models\rencontre;
use App\Models\demande_rencontre;
use App\Http\Controllers\EventController;
use Illuminate\Http\Request;



// Route where you need to be connected
Route::middleware("auth")->group(function () {
    // Authentification
    Route::get('/email/verify', function () {
        return view('auth.verify');
    })->name('verification.notice');
    Route::get('/email/verify', function () {
        return view('auth.verify');
    })->name('verification.notice');

    Route::get('/profile', [UsersController::class, 'profile'])->name('profile');
    Route::put('/profile/update/{id}', [UsersController::class, 'update'])->name('profile.update');


    // Meetup 
    Route::get('/meetup/form', [MeetupController::class, 'createForm']);
    Route::post('/meetup/form', [MeetupController::class, 'createForm']);
    Route::get('/meetup/form/{id}', [MeetupController::class, 'Form']);

    Route::get('/meetup/requests/{meetupId}', [MeetupController::class, 'MeetupRequests'])->name('meetupRequests');
    Route::get('/meetup/requests/accept/{meetupId}/{userId}', [MeetupController::class, 'AcceptRequest'])->name('acceptRequest');
    Route::get('/meetup/requests/deny/{meetupId}/{userId}', [MeetupController::class, 'DenyRequest'])->name('denyRequest');

    Route::get('/meetup/page/{meetupId}', [MeetupController::class, 'MeetupPage'])->name('meetupPage');
    Route::get('/meetup/page/join/{meetupId}', [MeetupController::class, 'JoinMeetup'])->name('joinMeetup');
    Route::get('/meetup/page/leave/{meetupId}', [MeetupController::class, 'LeaveMeetup'])->name('leaveMeetup');

    Route::post('/meetup/create', [MeetupController::class, 'create'])->name('/meetupForm');
    Route::get('/meetup/modify', [MeetupController::class, 'createForm'])->name('modifyMeetup');
    Route::post('/meetup/edit/{id}', [MeetupController::class, 'edit'])->name('editMeetup');

    Route::get('/meetup/page/removeParticipant/{meetupId}/{userId}', [MeetupController::class, 'RemoveParticipant'])->name("removeParticipant");
});


// Route where you can be disconnected
Route::middleware("guest")->group(function() {
    // Authentification
    Route::get('/signIn', [UsersController::class, 'registerForm'])->name("signIn");
    Route::get('/login', [UsersController::class, 'loginForm']);
});


Route::get('/', function (Request $request) {
    $meetupsData = rencontre::get();
    return view('search.search', ["meetupsData" => $meetupsData]);
});



// Authentification
Route::get('/email/verify/{id}/{hash}', [CustomVerificationController::class, 'verify'])->name('verification.verify');

Route::post('/signIn', [UsersController::class, 'create']);
Route::post('/login', [UsersController::class, 'login'])->name('login');
Route::get('/logout', [UsersController::class, 'logout']);
Route::get('profile/publications/{id}', [UsersController::class, 'publications'])->name('profile.publications');
Route::get('profile/amis/{id}', [UsersController::class, 'amis'])->name('profile.amis');
Route::get('profile/personnalite/{id}', [UsersController::class, 'personnalite'])->name('profile.personnalite');
Route::get('profile/interets/{id}', [UsersController::class, 'interets'])->name('profile.interets');

// TODO: remove when all controller are done.
Route::get('/home', function () {
    
    return view('home.feed');
});

Route::get('/search', function () {
    $meetupsData = rencontre::get();
    return view('search.search', ["meetupsData" => $meetupsData]);
});

// Event
Route::get('/event/{id}', [EventController::class, 'event']);
