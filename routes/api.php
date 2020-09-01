<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});



Route::get('example', 'HomeController@index');

//reg
Route::resource('users', 'User\UserController', ['except' => ['create', 'edit']]);
//login
Route::post('/login','Api\Auth\LoginController@login');
//logout
Route::post('/logout','Api\Auth\LoginController@logout');
//inf o korisniku
Route::get('self', 'UserController@self')->name('self');
//inf o timovima korsnika
Route::get('selfteam', 'Api\Team\TeamController@self');
//svi timovi - kreiranje timova
Route::resource('/teams', 'Api\Team\TeamController');
//auth refresh tokena
Route::get('refresh', 'Api\Auth\LoginController@refresh');
//pc games - kategorije
Route::get('games', 'Api\Games\GamesController@index');


//test
Route::match(['post'],'teams/add-player','Api\Team\TeamController@addPlayer');
