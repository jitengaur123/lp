<?php

class Client extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'client';

	
	/**
	 * The attributes from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fiilable = array('id','first_name', 'last_name', 'company_name', 'phone_office', 'mobile1',
	'mobile2','email',	'fax', 'address','city', 'state','postal_code' ,'country' );

	

}