<?php

class Post extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'post';

	
	/**
	 * The attributes from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fiilable = array('id','page_name', 'description');

	


}