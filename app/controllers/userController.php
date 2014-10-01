<?php

class userController extends \BaseController {

	/**
	 * Display a Login Page.
	 *
	 * @return Response
	 */
	public function login()
	{
		if(Auth::check()){
			$prefix = Helpers::prefixUrl();	
	        return Redirect::to($prefix.'/dashboard');
		}

		return View::make('user.login');
	}


	/**
	 * Post a login form
	 * 
	 * @param 
	 * @return Response
	 */
	public function postLogin()
	{
		//validate login
		$validation = $this->_validateUserLogin();

		if( $validation->fails() ) {

			return Redirect::to('login')->withErrors($validation->errors())->withInput();

		}

		$user = [
            'user_name' => Input::get('user_name'),
            'password' 	=> Input::get('password')
        ];

        $auth = $this->_attemptUserLogin($user);

        if($auth){

			$prefix = Helpers::prefixUrl();	
			Redirect::to($prefix.'/dashboard');
        }

        // authentication failure! lets go back to the login page
        return Redirect::to('login')
            	->with('flash_error', 'Your username/password combination was incorrect.');
	        
	}

	/**
	 * Attempt User Login
	 * 
	 * @param 
	 * @return Response
	 */
	private function _attemptUserLogin($user){

		if(Input::has('remember')){
        	$auth = Auth::attempt($user);
        }else{
        	$auth = Auth::attempt($user);
        }

		if ($auth) {
			
            return true;
        }

        return false;
	}

	/**
	 * Validate User login form
	 * 
	 * @param 
	 * @return Response
	 */
	private function _validateUserLogin(){
		$input = Input::all();

		$rules = [
			'user_name' => 'required',
			'password' => 'required',
		];

		$validation = Validator::make($input, $rules);

		return $validation;
	}

}
