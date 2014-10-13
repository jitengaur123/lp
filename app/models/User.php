<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


	/**
	 * Update Profile method
	 **
	 * @param $input
	 * @access public
	 * @return bool
	 */
	public static function updateProfile($input = NULL)
	{
		if(empty($input)) return false;
		$data = [];

		if(isset($input['first_name'])) $data['first_name'] = $input['first_name'];
		if(isset($input['last_name'])) $data['last_name'] 	= $input['last_name'];
		if(isset($input['email'])) $data['email'] 		= $input['email'];

		if(isset($input['emergency_contact_number'])) $data['emergency_contact_number'] = $input['emergency'];

		if(isset($input['gender'])) $data['gender'] 	= $input['gender'];

		if(isset($input['spouse_name'])) $data['spouse_name'] = $input['spouse_name'];

		if(isset($input['address'])) $data['address'] = $input['address'];

		if(isset($input['city'])) $data['city'] = $input['city'];

		if(isset($input['state'])) $data['state'] = $input['state'];

		if(isset($input['country'])) $data['country'] = $input['country'];

		if(isset($input['postcode'])) $data['postcode'] = $input['postcode'];

		if(isset($input['country'])) $data['country'] = $input['country'];

		if(isset($input['phone_number'])) $data['phone_number'] = $input['phone_number'];

		if(isset($input['mobile_number'])) $data['mobile_number'] = $input['mobile_number'];

		if(isset($input['race'])) $data['race'] = $input['race'];

		if(isset($input['about'])) $data['about'] = $input['bio'];

		if(isset($input['disability'])) $data['disability'] = json_encode($input['disability']);

		if(isset($input['veterun_status'])) $data['veterun_status'] = json_encode($input['veterun_status']);

		if(isset($input['date_of_discharge']))
			$data['date_of_discharge'] = $input['date_of_discharge'];

		
		if(isset($input['password']))
			$data['password'] = $input['password'];

		if(isset($input['dob']))
			$data['dob'] = date('m-d-Y', strtotime($input['dob']));

		if (Input::hasFile('profile_pic'))
		{
			$extension = Input::file('profile_pic')->getClientOriginalExtension();

			if(!in_array($extension, array('jpg','jpeg','png', 'gif'))){
				throw new Exception("Only jpg, png and gif image is allowed", 1);
				return;
			}		
				

			$file_name = Input::file('profile_pic')->getClientOriginalName();
			$destinationPath = 'uploads/profile/';
		   	Input::file('profile_pic')->move($destinationPath, $file_name);
		   	$data['profile_pic'] = $file_name;
		}
		$userid= Auth::user()->id;
		User::whereId($userid)->update($data);
		return true;
	}	

}
