<?php

class Usercertificate extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'safety_certificate';

	
	/**
	 * The attributes from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fiilable = array('id','title', 'date_of_completion', 'date_of_expiration', 'files', 'user_id' );

	

}