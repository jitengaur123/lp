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

Route::get('/forgotpass', 'RemindersController@getRemind');
Route::post('/postRemind', 'RemindersController@postRemind');
Route::get('/resetpass', 'RemindersController@getReset');
Route::post('/postReset', 'RemindersController@postReset');

Route::group(array('before'=>'auth'), function(){

	$prefix = Helpers::prefixUrl();

	Route::get('admin/dashboard', 'adminController@adminDashboard');
	Route::get('admin/', 'adminController@adminDashboard');

	Route::group(array('prefix' => $prefix), function(){

		Route::get('/profile', 'userController@profile');
		Route::get('/editprofile', 'userController@editProfile');
		Route::post('/editprofile', 'userController@updateProfile');

		Route::get('/adduser', 'userController@addUser');
		Route::post('/adduser', 'userController@postAddUser');

		

	});

	Route::get('/logout', function(){
		Auth::logout();
		return Redirect::to('login');
	});	
});

