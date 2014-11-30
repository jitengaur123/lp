<?php

class Workreport extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'work_reports';

	
	/**
	 * The attributes from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fiilable = array('id','job_number', 'client_id', 'site_id', 'date', 'description');

	public function timesheet(){

		return $this->hasMany('Timesheet');
	}

	public function client(){

		return $this->belongsTo('Client');
	}

	public function worksite(){

		return $this->belongsTo('Worksite', 'site_id');
	}

	public function submit_by(){

		return $this->belongsTo('User', 'submit_by');
	}


}