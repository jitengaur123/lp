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
			$prefix = 'admin';
			if(Auth::user()->level == 2){
				$prefix = 'supervisor';
			}
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
            'email' 	=> Input::get('email'),
            'password' 	=> Input::get('password')
        ];

        $auth = $this->_attemptUserLogin($user);

        if($auth){
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
			'email' => 'required|email',
			'password' => 'required',
		];

		$validation = Validator::make($input, $rules);

		return $validation;
	}

}
