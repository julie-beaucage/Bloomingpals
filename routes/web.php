<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MeetupController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\InterestsController;
use App\Http\Controllers\CustomVerificationController;
use App\Http\Controllers\PersonalityController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\SearchUserController;

Route::get('/', function () {
    return redirect()->route('home');
});
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/home/showcase', [HomeController::class, 'showcase'])->name('showcase');
Route::get('/home/user_meetups', [HomeController::class, 'user_meetups'])->name('user_meetups');
Route::get('/home/top_events', [HomeController::class, 'top_events'])->name('top_events');
Route::get('/home/recent_meetups', [HomeController::class, 'recent_meetups'])->name('recent_meetups');
Route::get('/home/upcoming_events', [HomeController::class, 'upcoming_events'])->name('upcoming_events');
Route::get('/home/sport_events', [HomeController::class, 'sport_events'])->name('sport_events');
Route::get('/home/comedy_events', [HomeController::class, 'comedy_events'])->name('comedy_events');
Route::get('/home/music_events', [HomeController::class, 'music_events'])->name('music_events');

Route::get('/about', function () {
    return view('about'); 
})->name('about');

Route::get('/personality-info', function () {
    return view('test_personality.info-personality'); 
})->name('personality-info');

Route::get('/FAQ', function () {
    return view('faq'); 
})->name('faq');

// Authentification
Route::get('/email/verify/{id}/{hash}', [CustomVerificationController::class, 'verify'])->name('verification.verify');
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/signIn', [UsersController::class, 'registerForm'])->middleware('guest')->name('register.form');
Route::get('/login', [UsersController::class, 'loginForm'])->middleware('guest')->name('login.form');
Route::post('/signIn', [UsersController::class, 'create'])->name('signin');
Route::post('/login', [UsersController::class, 'login'])->name('login');
Route::get('/logout', [UsersController::class, 'logout'])->name('logout');

//more profile cuz cors dont work
Route::post('profile/checkPassword', [UsersController::class, 'checkPassword']);
Route::post('/profile/checkEmail', [UsersController::class, 'isEmailTaken']);
Route::post('/profile/updateAccount', [UsersController::class, 'updateAccount']);



Route::middleware('auth')->group(function () {
    
    // Profile
    Route::get('/profile/{id}', [UsersController::class, 'profile'])->name('profile');
    Route::put('/profile/update/{id}', [UsersController::class, 'update'])->name('profile.update');
    Route::get('profile/amis/{id}', [UsersController::class, 'amis'])->name('profile.amis');
    //Route::get('profile/personnalite/{id}', [UsersController::class, 'personnalite'])->name('profile.personnalite');
    Route::get('profile/events/{id}', [UsersController::class, 'events'])->name('profile.events');
    Route::get('profile/rencontres/{id}', [UsersController::class, 'rencontres'])->name('profile.rencontres');
    Route::post('/verification/resend', [UsersController::class, 'resend'])->name('verification.resend');
    Route::post('profile/update/confidentiality/{id}', [UsersController::class, 'updateConfidentiality'])->name('profile.update.confidentiality');
    Route::post('profile/checkPassword', [UsersController::class, 'checkPassword'])->name('profile.checkPassword');
    Route::post('/profile/checkEmail', [UsersController::class, 'isEmailTaken']);
    Route::post('/profile/updateAccount', [UsersController::class, 'updateAccount'])->name('profile.updateAccount');;
    

    //INTERET
    Route::get('interets/interets/{id}', [InterestsController::class, 'interets'])->name('interets.interets');
    Route::put('/interets/update_Interets/{id}', [InterestsController::class, 'update_Interets'])->name('interets.update_Interets');

    
    //TEST
    Route::get('profile/personnalite/{id}', [PersonalityController::class, 'personnalite'])->name('profile.personnalite');
    Route::get('/personality/test', [PersonalityController::class, 'startTest'])->name('personality.test'); 
    Route::post('/personality/submit', [PersonalityController::class, 'submitTest'])->name('personality.submit');
    Route::get('/personality/results', [PersonalityController::class, 'results'])->name('personality.results');
    
    //meetupJUlie
    Route::get('/meetup/meetupForm/{eventId}', [MeetupController::class, 'showMeetupForm'])->name('meetups.form');
    // Route::post('/meetup', [MeetupController::class, 'create'])->name('meetups.create');
    // Route::post('/meetup/{id}/delete', [MeetupController::class, 'deleteMeetup'])->name('meetup.delete');

    Route::get('/my-meetup/{id}', [MeetupController::class, 'showMyMeetup'])->name('meetups.show');
    Route::get('/meetup/{id}/meetupManager', [MeetupController::class, 'manageRequests'])->name('meetup.manage');
    Route::get('/meetup/{id}', [MeetupController::class, 'meetup_detail'])->name('meetup.detail');

    Route::post('/meetup/{meetupId}/request/send', [MeetupController::class, 'sendRequest'])->name('meetups.send_request');
    Route::post('/meetup/{meetupId}/request/cancel', [MeetupController::class, 'cancelRequest'])->name('meetups.cancel_request');
    Route::post('/meetup/{meetupId}/request/leave', [MeetupController::class, 'leaveMeetup'])->name('meetups.leave');
    Route::post('/meetup/{meetupId}/request/{userId}/accept', [MeetupController::class, 'acceptRequest'])->name('meetups.accept_request');
    Route::post('/meetup/{meetupId}/request/{userId}/refuse', [MeetupController::class, 'refuseRequest'])->name('meetups.refuse_request');
    Route::post('/meetup/{meetupId}/request/{userId}/remove', [MeetupController::class, 'removeRequest'])->name('meetups.remove_request');

    Route::post('/meetup/create', [MeetupController::class, 'create']);
    Route::post('/meetup/create/{isEvent}', [MeetupController::class, 'create']);
    Route::post('/meetup/edit/{id}', [MeetupController::class, 'edit'])->where('id', '[0-9]+')->name("meetup.edit");
    Route::post('/meetup/delete/{id}', [MeetupController::class, 'delete'])->where('id', '[0-9]+')->name("meetup.delete");
    Route::get('/meetup/form/create', [MeetupController::class, 'form'])->name('meetup.form');
    Route::get('/meetup/form/{id}', [MeetupController::class, 'form']);
    Route::get('/meetup/form/event/{id}', [MeetupController::class, 'formEvent']);
    Route::get('/meetup/interests/{id}', [MeetupController::class, 'interests']);


    // Meetup
   /* Route::post('/meetup/create', [MeetupController::class, 'create']);
    Route::post('/meetup/create/{isEvent}', [MeetupController::class, 'create']);
    Route::get('/meetup', [MeetupController::class, 'index'])->name('meetup');
    Route::post('/meetup/edit/{id}', [MeetupController::class, 'edit'])->where('id', '[0-9]+');
    Route::get('/meetup/delete/{id}', [MeetupController::class, 'delete'])->where('id', '[0-9]+');
    Route::get('/meetup/form', [MeetupController::class, 'form']);
    Route::get('/meetup/form/{id}', [MeetupController::class, 'form']);
    Route::get('/meetup/form/event/{id}', [MeetupController::class, 'formEvent']);
    Route::get('/meetup/interests/{id}', [MeetupController::class, 'interests']);
    Route::get('/meetup/{meetupId}', [MeetupController::class, 'MeetupPage'])->name('meetupPage');
    Route::get('/meetup/join/{meetupId}', [MeetupController::class, 'JoinMeetup'])->name('joinMeetup');
    Route::get('/meetup/cancel/{meetupId}', [MeetupController::class, 'CancelJoiningMeetup'])->name('cancelJoiningMeetup');
    Route::get('/meetup/leave/{meetupId}', [MeetupController::class, 'LeaveMeetup'])->name('leaveMeetup');
    Route::get('/meetup/removeParticipant/{meetupId}/{userId}', [MeetupController::class, 'RemoveParticipant'])->name("removeParticipant");
    Route::get('/meetup/requests/{meetupId}', [MeetupController::class, 'MeetupRequests'])->name('meetupRequests');
    Route::get('/meetup/requests/accept/{meetupId}/{userId}', [MeetupController::class, 'AcceptRequest'])->name('acceptRequest');
    Route::get('/meetup/requests/deny/{meetupId}/{userId}', [MeetupController::class, 'DenyRequest'])->name('denyRequest');
*/
    // Event
    Route::get('/event/{id}', [EventController::class, 'event'])->name('event');
    Route::get('/event/interests/{id}', [EventController::class, 'interests']);

    // Search
    Route::get('/search', [SearchController::class, 'search'])->name('search');
    Route::get('/search/meetups', [SearchController::class, 'meetups'])->name('search.meetups');
    Route::get('/search/events', [SearchController::class, 'events'])->name('search.events');
    Route::get('/search/users', [SearchController::class, 'users'])->name('search.users');
    Route::get('/search/cities', [SearchController::class, 'cities'])->name('search.cities');
    Route::get('/search/interests', [SearchController::class, 'interests'])->name('search.interests');
    Route::get('/search/getInterests', [SearchController::class, 'getInterests'])->name('search.getInterests');

    // Messages
    Route::get('/messages/{id?}', [MessagesController::class, 'index'])->name('messages');
    Route::get('/searchUsers/{query?}', [MessagesController::class, 'searchUsers'])->name('searchUsers');
    Route::get('/chat/{id}/{page}', [MessagesController::class, 'chat'])->name('chat');
    Route::get('/menu/{query?}', [MessagesController::class, 'menu'])->name('menu');
    Route::post('/sendchat/{id}', [MessagesController::class, 'send'])->name('sendMessage');
    Route::post('/newChat', [MessagesController::class, 'newChat'])->name('newChat');
    Route::get('/update/{id}/{etag}', [MessagesController::class, 'update'])->name('checkUpdate');
    Route::get('/info/{id}', [MessagesController::class, 'info'])->name('info');
    Route::get('/chatMembers/{id}', [MessagesController::class, 'chatMembers'])->name('members');

    Route::post('/saveImage', [MessagesController::class, 'saveImage']);
    Route::post('/changeChatName/{id}', [MessagesController::class, 'changeChatName'])->name('changeChatName');
    Route::post('/leaveChat/{id}', [MessagesController::class, 'leaveChat'])->name('leaveChat');

    //Pals + seach pals_index
    Route::get('/pals', [SearchController::class, 'pals_index'])->name('searchPals');



    //utilisateurs
    
    Route::get("user/friend/request/send/{id}", [UsersController::class, "SendFriendRequest"])->name("SendFriendRequest");
    Route::get("user/friend/request/accept/{id}", [UsersController::class, "AcceptFriendRequest"])->name("AcceptFriendRequest");
    Route::get("user/friend/request/refuse/{id}", [UsersController::class, "RefuseFriendRequest"])->name("RefuseFriendRequest");
    Route::get("user/friend/request/cancel/{id}", [UsersController::class, "CancelFriendRequest"])->name("CancelFriendRequest");
    Route::get("user/friend/remove/{id}", [UsersController::class, "RemoveFriend"])->name("RemoveFriend");

    // Notification
    Route::get('/getNewNotification', [NotificationController::class, 'getNotification']);
    Route::get('/ReadNewNotification/{id}', [NotificationController::class, 'markAsRead']);
    Route::get('/ReadAll', [NotificationController::class, 'readAll']);
    Route::get('/notifications', [NotificationController::class,'index']);
    Route::delete('/notifications/delete', [NotificationController::class,'delete']);
    Route::get('/hasNotificationOn', [NotificationController::class, 'hasNotificationOn']);

    // Feed
    Route::get('/feed', function(){
        return View::make('feed.feed');
    })->name('feed');
    Route::get('/feed2', function(){
        return View::make('feed.feed2');
    })->name('feed2');

    Route::namespace('feed')->prefix('feed')->group( function () {
        Route::get('/fetchFeed/{page}', [HomeController::class, 'fetchFeed']);
        Route::get('/fetchData', [HomeController::class, 'fetchData']);
        Route::get('/fetchMeetups/{page}', [HomeController::class, 'fetchMeetups']);
        Route::get('/fetchEvents/{page}', [HomeController::class, 'fetchEvents']);
        Route::get('/fetchMeetupsInterest/{page}', [HomeController::class, 'fetchMeetupsInterest']);
        Route::get('/fetchEventsInterest/{page}', [HomeController::class, 'fetchEventsInterest']);
        Route::get('/userSuggestion', [HomeController::class, 'suggestedUsers']);
        Route::get('/calculateAffinity', [HomeController::class, 'calculateAffinity']);
        Route::get('/friends', [HomeController::class, 'friends']);
    });

    
});