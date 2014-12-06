<?php

class MagnetboardUser extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'magnet_board_user';

	
	/**
	 * The attributes from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fiilable = array('id','user_id', 'magnet_board_id');

	

	public function users(){
		return $this->belongsTo('Users','user_id');
	}
}