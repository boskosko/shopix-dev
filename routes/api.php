<?php

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

/*
REG
*/
Route::resource('users', 'User\UserController', ['except' => ['create', 'edit']]);
/*
Login
*/
Route::post('/login','Api\Auth\LoginController@login');

/*
Logout
*/Route::post('/logout','Api\Auth\LoginController@logout');

/*
Self info-user info
*/Route::get('self', 'UserController@self')->name('self');

/*
Self teams
*/Route::get('selfteam', 'Api\Team\TeamController@self');

/*
Auth refresh token
*/
Route::get('refresh', 'Api\Auth\LoginController@refresh');

/*
Games
*/
Route::get('games', 'Api\Games\GamesController@index');

/*
 * Add players to team
 */
Route::match(['post'],'teams/add-player','Api\Team\TeamController@addPlayer');
Route::get('teams/team-requests','Api\Team\TeamController@teamRequests');
Route::post('teams/accept-team-request','Api\Team\TeamController@acceptTeamRequest');
Route::post('teams/reject-team-request','Api\Team\TeamController@rejectTeamRequest');
Route::get('/teams/players','Api\Team\TeamController@players');


/*
Teams
*/
Route::resource('/teams', 'Api\Team\TeamController');
