<?php

class Worksite extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'worksite';

	
	/**
	 * The attributes from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fiilable = array('id','started_at', 'client_id', 'job_name', 'description', 'address',
	'city','state',	'postal_code', 'country','ocip', 'pm','billing_type' ,'cret_pr' ,'general_foreman_rate', 'foreman_rate', 'journyman_rate', 'apprentice_rate');

	public function client(){

		return $this->belongsTo('Client');
	}

	public function worksiterate(){

		return $this->hasMany('Worksiterate');
	}

}