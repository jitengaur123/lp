<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


Route::get('/login', 'userController@login');
Route::post('/login', 'userController@postLogin');


Route::group(array('before'=>'auth'), function(){

	$prefix = Helpers::prefixUrl();

	Route::group(array('prefix' => $prefix), function(){

		Route::get('/dashboard', function(){
			return Auth::user();

		});

	});

	Route::get('/logout', function(){
		
		Auth::logout();
		return Redirect::to('login');
	});	
});

