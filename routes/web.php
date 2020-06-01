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

Route::view('register', 'register');
Route::post('register', 'UserController@register');
Route::view('login', 'login');
Route::post('login', 'UserController@login');
//Route::view('/', 'homepage');
Route::get('/', 'UserController@getNewMatch');
Route::post('approve', 'MatchController@approve');
Route::post('notApprove', 'MatchController@notApprove');
