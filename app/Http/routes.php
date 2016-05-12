<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::resource('/user','UserController');
Route::get('/','HomeController@welcome');
Route::resource('/team','TeamsController');
Route::resource('/country','CountryController');
Route::resource('/player','PlayersController');
Route::resource('/game','GamesController');
Route::resource('/message','MessagesController');


//Route::controllers([
//   'auth'=>'Auth\AuthController',
//    'password'=>'Auth\PasswordController'
//]);
Route::auth();

Route::get('/home', 'HomeController@index');
