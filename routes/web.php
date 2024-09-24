<?php

use App\Http\Controllers\MeetupController;
use App\Http\Controllers\CustomVerificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Models\Rencontre;
use App\Models\demande_rencontre;

// rappel: le chemin doit être unique pour le routing

Route::middleware("auth")->group(function () {
    //put all route inside this that use auth
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


Route::get('/meetupForm', [MeetupController::class, 'createForm']);
Route::post('/meetupForm', [MeetupController::class, 'createForm']);
Route::post('/meetup/create', [MeetupController::class, 'create'])->name('/meetupForm');

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


/*meetup*/
Route::get('/meetupPage/{meetupId}', [MeetupController::class, 'MeetupPage'])/*->Middleware('auth')*/->name('meetupPage');

Route::post('/meetupPage/{meetupId}', [MeetupController::class, 'JoinMeetup'])/*->Middleware('auth')*/->name('joinMeetup');

Route::post('/meetupPage/{meetupId}', [MeetupController::class, 'LeaveMeetup'])/*->Middleware('auth')*/->name('leaveMeetup');
Route::get('/meetupForm/{meetupId}', [MeetupController::class, 'ModifyMeetup'])/*->Middleware('auth')*/->name('modifyMeetup');
Route::get('/meetupRequests/{meetupId}', [MeetupController::class, 'MeetupRequests'])/*->Middleware('auth')*/->name('meetupRequests');


Route::post('/meetupRequests/{meetupId}/{userId}/{status}', [MeetupController::class, 'AcceptRequest'])/*->Middleware('auth')*/->name('acceptRequest');
Route::post('/meetupRequests/{meetupId}/{userId}', [MeetupController::class, 'DenyRequest'])/*->Middleware('auth')*/->name('denyRequest');


Route::get('/', function () {
    $meetupId = 1;
    $meetupData = rencontre::where("id", $meetupId)->get()[0];
    $meetupTags = rencontre::GetTags($meetupId);
    $organisator = rencontre::GetOrganisator($meetupId);
    $participants = rencontre::GetParticipants($meetupId);
    $GetRequestMeetupCount = demande_rencontre::GetRequestMeetupCount($organisator->id);

    /** a faire: 
     * -s'assurer que le client peut y accéder car il doit être amis si l'événement est priver
     * -faire que le boutton pour rejoindre, modifier, ou quitter soit présent. */


    return view("meetups.meetupPage", ['meetupData' => $meetupData, "meetupTagsData" => $meetupTags, 
        "organisatorData" => $organisator, "participantsData" => $participants, 
        "requestsParticipantsCount" => $GetRequestMeetupCount]);

    //auth
    //return view('auth.login');

})->name("root");