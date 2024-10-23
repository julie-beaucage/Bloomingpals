<?php

use App\Http\Controllers\MeetupController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\InterestsController;
use App\Http\Controllers\CustomVerificationController;
use App\Http\Controllers\PersonalityController;



Route::get('/', function () {
    return view('auth.login');
});

// TODO: remove when all controller are done.
Route::get('/home', function () {
    return view('home.feed');
})->name('home');

// Authentification
Route::get('/email/verify/{id}/{hash}', [CustomVerificationController::class, 'verify'])->name('verification.verify');
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/signIn', [UsersController::class, 'registerForm'])->middleware('guest');
Route::get('/login', [UsersController::class, 'loginForm'])->middleware('guest');
Route::post('/signIn', [UsersController::class, 'create'])->name('signin');
Route::post('/login', [UsersController::class, 'login'])->name('login');
Route::get('/logout', [UsersController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    
    // Home page
    Route::get('/home', function () {
        return view('home.feed');
    })->name('home');


    // Profile
    Route::get('/profile/{id}', [UsersController::class, 'profile'])->name('profile');
    Route::put('/profile/update/{id}', [UsersController::class, 'update'])->name('profile.update');
    Route::get('profile/amis/{id}', [UsersController::class, 'amis'])->name('profile.amis');

    //INTERET
    Route::get('interets/interets/{id}', [InterestsController::class, 'interets'])->name('interets.interets');
    Route::put('/interets/update_Interets', [InterestsController::class, 'update_Interets'])->name('interets.update_Interets');

    //TEST
    Route::get('profile/personnalite/{id}', [PersonalityController::class, 'personnalite'])->name('profile.personnalite');
    Route::get('/personality/test', [PersonalityController::class, 'startTest'])->name('personality.test'); 
    Route::post('/personality/submit', [PersonalityController::class, 'submitTest'])->name('personality.submit');
    Route::get('/personality/results', [PersonalityController::class, 'results'])->name('personality.results');
    

    // Meetup
    Route::get('/meetupForm', [MeetupController::class, 'Form']);
    Route::get('/meetupForm/{id}', [MeetupController::class, 'Form'])->name('meetupForm');
    Route::post('/meetup/create', [MeetupController::class, 'create']);
    Route::post('/meetup/edit/{id}', [MeetupController::class, 'edit'])->where('id', '[0-9]+');
    Route::get('/meetup', [MeetupController::class, 'index'])->name('meetup');
    Route::get('/meetup/delete/{id}', [MeetupController::class, 'delete'])->where('id', '[0-9]+');


    Route::get('/meetup/page/{meetupId}', [MeetupController::class, 'MeetupPage'])->name('meetupPage');
    Route::get('/meetup/page/join/{meetupId}', [MeetupController::class, 'JoinMeetup'])->name('joinMeetup');
    Route::get('/meetup/page/leave/{meetupId}', [MeetupController::class, 'LeaveMeetup'])->name('leaveMeetup');

    Route::get('/meetup/page/removeParticipant/{meetupId}/{userId}', [MeetupController::class, 'RemoveParticipant'])->name("removeParticipant");

    Route::get('/meetup/requests/{meetupId}', [MeetupController::class, 'MeetupRequests'])->name('meetupRequests');
    Route::get('/meetup/requests/accept/{meetupId}/{userId}', [MeetupController::class, 'AcceptRequest'])->name('acceptRequest');
    Route::get('/meetup/requests/deny/{meetupId}/{userId}', [MeetupController::class, 'DenyRequest'])->name('denyRequest');


    // Event
    Route::get('/event/{id}', [EventController::class, 'event'])->name('event');

    // Search
    Route::get('/search', [SearchController::class, 'search'])->name('search');
    Route::get('/search/meetups', [SearchController::class, 'meetups'])->name('search.meetups');
    Route::get('/search/events', [SearchController::class, 'events'])->name('search.events');
    Route::get('/search/users', [SearchController::class, 'users'])->name('search.users');

    // Notification
    Route::get('/getNewNotification', [NotificationController::class, 'getNotification']);
    Route::get('/ReadNewNotification/{id}', [NotificationController::class, 'markAsRead']);
    Route::get('/ReadAll', [NotificationController::class, 'readAll']);
    Route::get('/notifications', [NotificationController::class,'index']);
    Route::get('/notifications/delete/{id}', [NotificationController::class,'delete'])->where('id', '[0-9]+');
});