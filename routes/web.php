<?php

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

/*Route::get('/', function () {
    return view('welcome');
}); */
Route::group(['middleware' => "web"],function(){
    Route::view('register', 'register');
    Route::post('register', 'UserController@register');
    Route::view('login', 'login');
    Route::post('login', 'UserController@login');
    Route::get('/', 'UserController@show');
    Route::post('approve', 'MatchController@approve');
    Route::post('notApprove', 'MatchController@notApprove');
    Route::get('messages/{id2}', 'MessageController@show')->middleware('checkPairs');
    Route::post('messages/addMessage', 'MessageController@addMessage');
    Route::get('logout', 'UserController@logout');
    Route::get('profile', 'UserController@showProfilePage');
    Route::get('updateName', 'UserController@updateName');
    Route::get('updateBio', 'UserController@updateBio');
    Route::get('changePassword', 'UserController@updatePassword');
    Route::post('updatePicture', 'UserController@updatePicture');
});
    //Route::view('/', 'homepage');
//Route::get('messages/{id2}', 'MessageController@getMessages');
//Route::get('/messages', 'MessageController@show');
//Route::get(uri: 'messages/{id2}', action:'MessageController@show');
