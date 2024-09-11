<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\MeetupController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view("meetups.meetupPage", ['meetupId' => 1]);
});

// TODO: remove when all controller are done.
Route::get('/home', function () {
    return view('home.feed');
});

Route::get('/search', function () {
    return view('search.search');
});

Route::get('/profile', function () {
    return view('profile.profile');
});
/*this route need an id for the event*/
Route::get('/meetupPage/{meetupId}', [MeetupController::class, 'MeetupPage'])->name('meetupPage');