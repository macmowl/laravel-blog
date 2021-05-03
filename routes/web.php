<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UsersController;
// use App\Http\Controllers\SignupController;
// use App\Http\Controllers\ConnectionController;

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

Route::get('/', 'App\Http\Controllers\UsersController@list');

Route::group([
    'middleware' => 'App\Http\Middleware\Auth',
], function() {
    Route::get('/account', 'App\Http\Controllers\AccountController@home');
    Route::get('/logout', 'App\Http\Controllers\AccountController@logout');
    Route::post('/update_password', 'App\Http\Controllers\AccountController@updatePassword');
    Route::post('/messages', 'App\Http\Controllers\MessagesController@new');
    Route::get('/feed', 'App\Http\Controllers\FeedController@list');
    Route::post('/{email}/follow', 'App\Http\Controllers\FollowController@new');
    Route::delete('/{email}/follow', 'App\Http\Controllers\FollowController@delete');
});

Route::get('/signup', 'App\Http\Controllers\SignupController@form');
Route::post('/signup', 'App\Http\Controllers\SignupController@treatment');

Route::get('/connection', 'App\Http\Controllers\ConnectionController@form');
Route::post('/connection', 'App\Http\Controllers\ConnectionController@treatment');


Route::get('/{email}', 'App\Http\Controllers\UsersController@see');