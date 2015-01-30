<?php

class userController extends \BaseController {

	public $prefix = '';

	function __construct(){
		$this->prefix = Config::get('constants.PREFIX');
	}


	/**
	 * Display a Login Page.
	 *
	 * @return Response
	 */
	public function login()
	{

		if(Auth::check()){
	       	return Redirect::to( $this->prefix .'/dashboard');
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

			$prefix = $this->prefix;	
			
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
        	$auth = Auth::attempt($user, true);
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
			return Redirect::to( $this->prefix . '/editprofile')->withErrors($validation);
		}
		$input = Input::all();

		$UserEmail = User::whereEmail($input['email'])->where('id','!=', Auth::user()->id)->get()->toArray();
		if(!empty($UserEmail)){
			return Redirect::to( $this->prefix . '/editprofile')->withErrors(['Email is allready exists']);
		}

		try{

			
			User::updateProfile($input, Auth::user()->id);

			return Redirect::to( $this->prefix . '/editprofile' )->withStatus('Profile has been successfully updated.');

		}
		catch(Exception $e){
			//echo $e->getMessage();
			return Redirect::to( $this->prefix . '/editprofile' )->withErrors([$e->getMessage()]);	
		}
		
		
	}

	private function _validateProfile(){

		$rules = [
			'first_name'	=> 'required',
			'last_name'		=> 'required',
			/*'email'			=> 'required|email',*/
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

		$user_id = Auth::user()->id;
		$role = Auth::user()->role;
		if($role == 1){
			$userRole = UserRole::where('id', '!=',1)->get();
			$parentUser = User::whereRole(2)->get();
		}else if($role == 2){
			$userRole = UserRole::where('id', '!=',1)->where('id', '!=',2)->get();
			$parentUser = User::whereRole(3)->get();
		}else{
			$userRole = UserRole::whereId(4)->get();
			$parentUser = User::whereId($user_id)->get();
		}
		$data = [
			'parentUser' 	=> $parentUser,
			'roles' 		=> $userRole,
		];
		return View::make('user.adduser', $data);
	}


	public function postAddUser(){
		$rules = [
			'first_name'	=> 'required',
			'last_name'		=> 'required',
			'email'			=> 'required|email|unique:users',
			'user_name' 	=> 'required|unique:users',
			'password' 		=> 'required|confirmed:password_confirmation',
			'password_confirmation' => 'required',
		];

		$input = Input::all();

		$validation = Validator::make($input, $rules);

		if($validation->fails()){
			return Redirect::to( $this->prefix . '/adduser')->withErrors($validation);
		}

		try{

			$input = Input::all();
			unset($input['password_confirmation']);

			$mailData = $input;
			$input['user_auth_id'] = 'AMA-EM-'.uniqid();
			$input['password'] = Hash::make($input['password']);
			User::insert($input);
			mkdir(public_path().'/files/'.$input['user_name'],0700);
			Mail::send('emails.user.welcome', array('mailData' => $mailData), function($message)
			{

			    $message->to(Input::get('email'), Input::get('first_name').' '.Input::get('last_name'))
			    		->subject('You have register successfully');
			});

			return Redirect::to( $this->prefix . '/adduser' )->withStatus('Profile has been successfully added.');

		}
		catch(Exception $e){
			//echo $e->getMessage();
			return Redirect::to( $this->prefix . '/adduser' )->withErrors([$e->getMessage()]);	
		}
	}



	public function userList(){

		$users = User::where('id', '!=', Auth::user()->id)->with('userrole')->get();// User::all();
		return View::make('user.userlist')->with('users', $users);
	}


	public function deleteUser($user_id = NULL){

		if(empty($user_id)) return false;

		User::find($user_id)->delete();

		return Redirect::to( $this->prefix . '/users' )->withStatus('User has been successfully deleted.');
	}

	public function viewUserProfile($user_id = NULL){

		if(empty($user_id)) return Redirect::to($this->prefix. '/users');

		$data = User::find($user_id);

		return View::make('user.viewuser')->with('data', $data);
	}



	/**
	 * Display a edit profile page
	 */
	public function editUserProfile($user_id = NULL)
	{
		if(empty($user_id)) return Redirect::to($this->prefix . '/users');

		$data = User::find($user_id);
		return View::make('user.edit_user_profile')->with('data', $data);
	}


	/**
	 * Update profile data
	 *
	 * return response
	 */
	public function updateUserProfile($user_id){

		$validation = $this->_validateProfile();

		if($validation->fails()){
			return Redirect::to( $this->prefix . '/edituser/'.$user_id)->withErrors($validation);
		}

		$input = Input::all();
		$UserEmail = User::whereEmail($input['email'])->where('id','!=',$user_id)->get()->toArray();
		if(!empty($UserEmail)){
			return Redirect::to( $this->prefix . '/edituser/'.$user_id)->withErrors(['Email is allready exists']);
		}

		try{

			
			User::updateProfile($input, $user_id);

			return Redirect::to( $this->prefix . '/edituser/'.$user_id )->withStatus('User has been successfully updated.');

		}
		catch(Exception $e){
			//echo $e->getMessage();
			return Redirect::to( $this->prefix . '/edituser/'.$user_id )->withErrors([$e->getMessage()]);	
		}
		
		
	}

	public function editDeleteUser(){

		$data = [
			'users' => User::where('id', '!=', Auth::user()->id)->get()
		];
		return View::make('user.editdeleteuser', $data);
	}

	
	public function postEditDeleteUser(){

		$user_id = Input::get('id');
		if(empty($user_id)) return false;

		User::find($user_id)->delete();

		return Redirect::to( $this->prefix . '/editdeleteuser' )->withStatus('User has been successfully deleted.');
	}



	public function viewUser(){

		$user_id = Input::get('user_id');
		if(empty($user_id)) return ['data'=>'User Not Found'];

		$user = User::where('id','=',$user_id)->with('userrole')->get()->toArray();
		$data = View::make('user.view_profile_model')->with('user', $user[0])->render();
		return Response::Json(['data'=>$data]);

	}


	function parentUserChange($role = NULL){

		if(empty($role)) return ['result'=> true];

		if($role != 1)
			$role = $role-1;


		$parentUser = User::whereRole($role)->get();
		$data = ['result'=> true, 'parentUser'=> $parentUser];
		return $data;
	}
}
