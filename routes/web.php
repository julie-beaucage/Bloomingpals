<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\MeetupController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Models\Rencontre;


Route::get('/', function () {
    $meetupId = 1;

    $meetupData = rencontre::where("id", $meetupId)->get()[0];
    $meetupTags = rencontre::GetTags($meetupId);
    $organisator = rencontre::GetOrganisator($meetupId);
    $participants = rencontre::GetParticipants($meetupId);

    /*check if public then if public set button to join*/
    return view("meetups.meetupPage", ['meetupData' => $meetupData, "meetupTagsData" => $meetupTags, 
        "organisatorData" => $organisator, "participantsData" => $participants]);
    //return view('Auth.login');
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


/*this route need an id for the meetup*/
Route::get('/meetupPage/{meetupId}', [MeetupController::class, 'MeetupPage'])/*->Middleware('auth')*/->name('meetupPage');

Route::get('/meetupPage/{meetupId}/{userId}', [MeetupController::class, 'JoinMeetup'])/*->Middleware('auth')*/->name('joinMeetup');
