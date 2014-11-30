<?php

class Timesheet extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'timesheet';

	
	/**
	 * The attributes from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fiilable = array('id','labour_id', 'class', 'reg_hour', 'reg_rate', 'ot_hour', 'ot_rate', 'dt_hour', 'dt_rate', 'work_reports_id');

	public function client(){

		return $this->belongsTo('Client');
	}


}