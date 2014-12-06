<?php

class Magnetboard extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'magnet_board';

	
	/**
	 * The attributes from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fiilable = array('id','client_id', 'worksite_id');

	public function client(){
		return $this->belongsTo('Client', 'client_id');
	}

	public function worksite(){
		return $this->belongsTo('Worksite','worksite_id');
	}

	public function magnet_users(){
		return $this->hasMany('MagnetboardUser');
	}
}