<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;


class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	protected $dates = ['deleted_at'];


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


	/**
	 * The attributes from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fiilable = array('job_title','first_name', 'last_name', 'email', 'emergency_contact_name','emergency_contact_number', 'gender', 'spouse_name', 'address', 
				'city', 'state', 'country', 'postcode', 'country', 'phone_number', 'mobile_number', 'race', 'about', 'disability',
				 'veterun_status', 'date_of_discharge', 'dob', 'profile_pic');


	/**
	 * Update Profile method
	 **
	 * @param $input
	 * @access public
	 * @return bool
	 */
	public static function updateProfile($input = NULL, $userid = NULL)
	{
		if(empty($input)) return false;
		$data = [];

		if(isset($input['job_title'])) $data['job_title'] = $input['job_title'];
		if(isset($input['first_name'])) $data['first_name'] = $input['first_name'];
		if(isset($input['last_name'])) $data['last_name'] 	= $input['last_name'];
		if(isset($input['email'])) $data['email'] 		= $input['email'];

		
		if(isset($input['emergency_contact_name'])) $data['emergency_contact_name'] = $input['emergency_contact_name'];
		if(isset($input['emergency'])) $data['emergency_contact_number'] = $input['emergency'];

		if(isset($input['gender'])) $data['gender'] 	= $input['gender'];

		if(isset($input['spouse_name'])) $data['spouse_name'] = $input['spouse_name'];

		if(isset($input['address'])) $data['address'] = $input['address'];

		if(isset($input['locality'])) $data['city'] = $input['locality'];

		if(isset($input['state'])) $data['state'] = $input['state'];

		if(isset($input['country'])) $data['country'] = $input['country'];

		if(isset($input['postal_code'])) $data['postcode'] = $input['postal_code'];

		if(isset($input['country'])) $data['country'] = $input['country'];

		if(isset($input['phone_number'])) $data['phone_number'] = $input['phone_number'];

		if(isset($input['mobile_number'])) $data['mobile_number'] = $input['mobile_number'];

		if(isset($input['race'])) $data['race'] = $input['race'];

		if(isset($input['bio'])) $data['about'] = $input['bio'];

		if(isset($input['disability'])) $data['disability'] = json_encode($input['disability']);

		if(isset($input['veterun_status'])) $data['veterun_status'] = json_encode($input['veterun_status']);

		if(isset($input['date_of_discharge']) && $input['date_of_discharge'] != ""){
			list($d,$m,$y) = explode('/', $input['date_of_discharge']);
			$date_of_discharge = date('Y-m-d H:i:s', mktime(0,0,0,$m,$d,$y));
			$data['date_of_discharge'] = $date_of_discharge;
		}

		if(isset($input['rating'])) $data['rating'] = $input['rating'];
		if(isset($input['user_note'])) $data['user_note'] = $input['user_note'];

		
		if(isset($input['password']) && $input['password'] != "")	$data['password'] = Hash::make($input['password']);

		if(isset($input['dob'])  && $input['dob'] != ""){
			list($d,$m,$y) = explode('/', $input['dob']);
			$date_create = date('Y-m-d H:i:s', mktime(0,0,0,$m,$d,$y));
			$data['dob'] = $date_create;
		}

		$data['is_complete'] = 1;

		if (Input::has('has_certificate'))
			$data['has_certificate'] = $input['has_certificate'];

		if (Input::hasFile('profile_pic'))
		{
			$extension = Input::file('profile_pic')->getClientOriginalExtension();

			if(!in_array($extension, array('jpg','jpeg','png', 'gif'))){
				throw new Exception("Only jpg, png and gif image is allowed", 1);
				//return;
			}		
				
			$file_name = Input::file('profile_pic')->getClientOriginalName();
			$file_name = time().$file_name;
			$destinationPath = 'uploads/profile/';
		   	Input::file('profile_pic')->move($destinationPath, $file_name);
		   	$data['profile_pic'] = $file_name;
		}
		
		
		User::whereId($userid)->update($data);
		return true;
	}	


	public function userrole()
    {
        return $this->belongsTo('UserRole', 'role');
    }


    public function certificate()
    {
        return $this->hasMany('Usercertificate', 'user_id');
    }
    

}
