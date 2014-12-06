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

Route::get('/logout', function(){
		Auth::logout();
		return Redirect::to('login');
	});	

Route::group(array('before'=>'auth', 'prefix' => Config::get('constants.PREFIX')), function(){

	Route::get('/dashboard', 'adminController@adminDashboard');
	Route::get('/', 'adminController@adminDashboard');

	Route::get('/profile', 'userController@profile');
	Route::get('/editprofile', 'userController@editProfile');
	Route::post('/editprofile', 'userController@updateProfile');
	
});

Route::group(array('before'=>'auth|roles', 'prefix' => Config::get('constants.PREFIX')), function(){
	allRoutes();
});


	

function allRoutes(){

	//user routes 
	userRoutes(); 

	//client routes
	clientRoutes();

	//worksite routes
	workSiteRoutes();

	//workreport routes
	workReportRoutes();

	//magnet board
	magnetBoardRoutes();
}

function userRoutes(){

	//User section 
	Route::get('/adduser', 'userController@addUser');
	Route::post('/adduser', 'userController@postAddUser');

	Route::get('/users', 'userController@userList');
	Route::get('/delete_user/{user_id}', 'userController@deleteUser')->where('user_id', '[0-9]+');

	Route::get('/viewuser/{user_id}', 'userController@viewUserProfile')->where('user_id', '[0-9]+');
	Route::get('/edituser/{user_id}', 'userController@editUserProfile')->where('user_id', '[0-9]+');
	Route::post('/edituser/{user_id}', 'userController@updateUserProfile')->where('user_id', '[0-9]+');

	Route::post('/parent_user/{role}', 'userController@parentUserChange')->where('role', '[0-9]+');;

	Route::get('/editdeleteuser', 'userController@editDeleteUser');
	Route::post('/editdeleteuser', 'userController@postEditDeleteUser');	
	

}

function clientRoutes(){

	//Client section 
	Route::resource('/client', 'clientController');
	Route::get('/client/delete/{id}', 'clientController@deleteUser')->where('id', '[0-9]+');
	Route::post('/client/updateclient/{client_id}', 'clientController@updateClient')->where('client_id', '[0-9]+');


	Route::get('/editdeleteclient', 'clientController@editDeleteClient');
	Route::post('/editdeleteclient', 'clientController@postEditDeleteClient');	
}

function workSiteRoutes(){

	//Client section 
	Route::resource('/worksite', 'worksiteController');
	Route::get('/worksite/delete/{id}', 'worksiteController@deleteSite')->where('id', '[0-9]+');
	Route::post('/worksite/updatesite/{id}', 'worksiteController@updateSite')->where('id', '[0-9]+');

	Route::get('/editdeletesite', 'worksiteController@editDeleteWorkSite');
	Route::post('/editdeletesite', 'worksiteController@postEditDeleteWorkSite');

	Route::post('/client_worksite', 'worksiteController@clientWorksite');	
}


function workReportRoutes(){

	//Client section 
	Route::resource('/workreport', 'workreportController');
	Route::get('/workreport/delete/{id}', 'workreportController@deleteReport')->where('id', '[0-9]+');
	Route::post('/workreport/updatereport/{id}', 'workreportController@updateReport')->where('id', '[0-9]+');

	Route::get('/editdeletereport', 'workreportController@editDeleteWorkSite');
	Route::post('/editdeletereport', 'workreportController@postEditDeleteWorkSite');	
}


function magnetBoardRoutes(){

	//Client section 
	Route::resource('/magnet', 'magnetboardController');
	Route::get('/magnet/delete/{id}', 'magnetboardController@delete')->where('id', '[0-9]+');
	Route::post('/magnet/updatereport/{id}', 'magnetboardController@update')->where('id', '[0-9]+');

	Route::get('/editdeletemagnet', 'magnetboardController@editDelete');
	Route::post('/editdeletemagnet', 'magnetboardController@postEditDelete');	
}


/*Route::group(array('before'=>'auth|complete', 'prefix' => Config::get('constants.PREFIX')), function(){

	Route::get('/editprofile', 'userController@editProfile');
	

});*/

