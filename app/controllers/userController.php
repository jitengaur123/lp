<?php

class userController extends \BaseController {

	public $prefix = '';

	function __construct(){
		$this->prefix = Helpers::prefixUrl();
	}


	/**
	* Display a profile view
	*
	* @return Response
	*/
	public function profile()
	{
		
		$user_id = Auth::user()->id;
		$data = User::find($user_id);

		return View::make('user.profile')->with('data', $data);
	}

	/**
	 * Display a edit profile page
	 */
	public function editProfile()
	{

		$user_id = Auth::user()->id;
		$data = User::find($user_id);
		return View::make('user.edit_profile')->with('data', $data);
	}


	/**
	 * Update profile data
	 *
	 * return response
	 */
	public function updateProfile(){

		$validation = $this->_validateProfile();

		if($validation->fails()){
			return Redirect::to($this->prefix. '/editprofile')->withErrors($validation);
		}

		try{

			$input = Input::all();
			User::updateProfile($input);

			return Redirect::to($this->prefix. '/editprofile')->withStatus('Profile has been successfully updated.');

		}
		catch(Exception $e){
			//echo $e->getMessage();
			return Redirect::to($this->prefix. '/editprofile')->withErrors([$e->getMessage()]);	
		}
		
		
	}

	private function _validateProfile(){

		$rules = [
			'first_name'	=> 'required',
			'last_name'		=> 'required',
			'email'			=> 'required|email',
			'profile_pic' 	=> 'mimes:jpeg,jpg,png,gif'
		];

		$input = Input::all();

		$validation = Validator::make($input, $rules);

		return $validation;

	}



	/**
	 * Add Users as per record
	 *	
	 * 
	 * return response
	 */
	public function adduser()
	{
		return View::make('user.adduser');
	}


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

			return Response::json(array('result'=>false, 'errors'=>$validation->errors()));

		}

		$user = [
            'user_name' => Input::get('user_name'),
            'password' 	=> Input::get('password')
        ];

        $auth = $this->_attemptUserLogin($user);

        if($auth){

			$prefix = Helpers::prefixUrl();	
			
			$url = url($prefix.'/dashboard');
			return Response::json(array('result'=>true, 'redirectUrl' => $url));
        }

        // authentication failure! lets go back to the login page
        return Response::json(array('result'=>false, 'errors'=>array('Your username/password combination was incorrect.')));

	        
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
