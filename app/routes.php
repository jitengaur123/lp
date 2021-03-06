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

	Route::get('/safety_instruction', 'adminController@instruction');
	Route::get('/document', 'adminController@document');
	Route::get('/chart', 'adminController@chart');

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

	//Post routes
	postRoutes();

	//repository routes
	repositoryRoutes();

	magnetRoutes();
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
	Route::get('/viewuserdata', 'userController@viewUser');
	
	

}

function clientRoutes(){

	//Client section 
	Route::resource('/client', 'clientController');
	Route::get('/client/delete/{id}', 'clientController@deleteUser')->where('id', '[0-9]+');
	Route::post('/client/updateclient/{client_id}', 'clientController@updateClient')->where('client_id', '[0-9]+');


	Route::get('/editdeleteclient', 'clientController@editDeleteClient');
	Route::post('/editdeleteclient', 'clientController@postEditDeleteClient');	
	Route::get('/viewclientdata', 'clientController@viewClient');
}

function workSiteRoutes(){

	//Client section 
	Route::resource('/worksite', 'worksiteController');
	Route::get('/worksite/delete/{id}', 'worksiteController@deleteSite')->where('id', '[0-9]+');
	Route::post('/worksite/updatesite/{id}', 'worksiteController@updateSite')->where('id', '[0-9]+');

	Route::get('/editdeletesite', 'worksiteController@editDeleteWorkSite');
	Route::post('/editdeletesite', 'worksiteController@postEditDeleteWorkSite');

	Route::post('/client_worksite', 'worksiteController@clientWorksite');	
	Route::get('/viewworksitedata', 'worksiteController@viewWorksite');
}


function workReportRoutes(){

	//Client section 
	Route::resource('/workreport', 'workreportController');
	Route::get('/workreport/delete/{id}', 'workreportController@deleteReport')->where('id', '[0-9]+');
	Route::post('/workreport/updatereport/{id}', 'workreportController@updateReport')->where('id', '[0-9]+');

	Route::get('/editdeletereport', 'workreportController@editDeleteWorkReport');
	Route::post('/editdeletereport', 'workreportController@postEditDeleteWorkReport');	

	Route::post('/get_labors', 'workreportController@getLabors');
	Route::get('/workreport/approve/{id}', 'workreportController@approve')->where('id', '[0-9]+');
	Route::get('/viewworkreportdata', 'workreportController@viewWorkreport');
	
}


function magnetBoardRoutes(){

	//Client section 
	Route::resource('/magnet', 'magnetboardController');
	Route::get('/magnet/delete/{id}', 'magnetboardController@delete')->where('id', '[0-9]+');
	Route::post('/magnet/update/{id}', 'magnetboardController@update')->where('id', '[0-9]+');

	Route::get('/editdeletemagnet', 'magnetboardController@editDelete');
	Route::post('/editdeletemagnet', 'magnetboardController@postEditDelete');	
	Route::get('/viewmagnetdata', 'magnetboardController@viewMagnet');

	Route::post('/checkboardexists', 'magnetboardController@checkBoardExists');
	

}


function magnetRoutes(){

	//Client section 
	Route::resource('/magnetboard', 'magnetController');
	Route::get('/magnetboard/delete/{id}', 'magnetController@delete')->where('id', '[0-9]+');
	Route::post('/magnetboard/update/{id}', 'magnetController@update')->where('id', '[0-9]+');

	Route::post('/magnetboard/updateboard', 'magnetController@updateboard');

	Route::get('/editdeleteboard', 'magnetController@editDelete');
	Route::post('/editdeleteboard', 'magnetController@postEditDelete');	
	Route::get('/viewboarddata', 'magnetController@viewMagnet');

	Route::post('/checkmboardexists', 'magnetController@checkBoardExists');
	

}

function postRoutes(){

	//Client section 
	Route::resource('/post', 'postController');
	Route::get('/post/delete/{id}', 'postController@delete')->where('id', '[0-9]+');
	Route::post('/post/update/{id}', 'postController@update')->where('id', '[0-9]+');


}

function repositoryRoutes(){

	//Client section 
	Route::get('/repository', 'repositoryController@index');

	Route::get('/filemanager', 'repositoryController@filemanager');

	Route::get('/repository/upload', 'repositoryController@upload');

	Route::post('/repository/uploadfiles', 'repositoryController@uploadfiles');

	

}


/*Route::group(array('before'=>'auth|complete', 'prefix' => Config::get('constants.PREFIX')), function(){

	Route::get('/editprofile', 'userController@editProfile');
	

});*/

