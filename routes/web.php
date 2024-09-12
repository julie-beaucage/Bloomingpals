<?php

use App\Http\Controllers\RencontresController;
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
    return view('home.feed');
    //return view('rencontres.formRencontre');
  // return redirect()->action([RencontresController::class, 'index']);
});

// TODO: remove when all controller are done.
Route::get('/home', function () {
    return view('home.feed');
});

Route::get('/search', function () {
    return view('search.search');
});

//Route::get('/profile', function () {
  //  return view('profile.profile');
//});
Route::get('/profile', function () {
    return redirect()->action([RencontresController::class, 'index']);
});
